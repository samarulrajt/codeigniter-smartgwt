/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package modulgps;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import javax.microedition.io.Connector;
import javax.microedition.io.HttpConnection;
import javax.microedition.lcdui.Alert;
import javax.microedition.lcdui.AlertType;
import javax.microedition.lcdui.ChoiceGroup;
import javax.microedition.lcdui.Command;
import javax.microedition.lcdui.CommandListener;
import javax.microedition.lcdui.Display;
import javax.microedition.lcdui.Displayable;
import javax.microedition.lcdui.Form;
import javax.microedition.lcdui.StringItem;
import javax.microedition.lcdui.Ticker;
import javax.microedition.midlet.MIDlet;
import javax.microedition.midlet.MIDletStateChangeException;

/**
 * @author Trieu Nguyen
 */
public class ModuleBluetoothGPSMidlet extends MIDlet implements CommandListener,
        Runnable {

    public static final String NO_GPS_FOUND = "No Gps Found";
    private Command cmdBack;
    private Form mainForm;
    private Command cmdSearchGps;
    private Form gpsForm;
    private Command cmdSearch;
    private Command cmdSelect;
    private Command cmdExit;
    private Command cmdSendGPSLog;
    private Command cmdStopSendGPSLog;
    private ChoiceGroup choiceGps;
    private StringItem gpsState;
    private StringItem quality;
    private StringItem latitude;
    private StringItem longitude;
    private StringItem time;
    private StringItem satellite;
    private StringItem ackGPSLog;
    private static final int STATE_IDLE = 0;
    private static final int STATE_SEARCH = 1;
    private static final int STATE_READING = 2;
    private static final int STATE_SENDING = 4;
    private boolean active = false;
    private int state = STATE_IDLE;
    private static String log = "$empty,1";
    private static String response_msg = "No answer!";
    private Thread thread;
    private GPSLogger logger;
    private Alert mModalAlert;

    protected void destroyApp(boolean arg0) throws MIDletStateChangeException {
        exit();
    }

    protected void pauseApp() {
    }

    protected void startApp() throws MIDletStateChangeException {
        display(initMainForm());
    }

    public void commandAction(Command cmd, Displayable display) {
        if (display == mainForm) {
            if (cmd == cmdSearchGps) {
                display(initGPSForm());
            } else if (cmd == cmdExit) {
                exit();
            }

            if (cmd == cmdSendGPSLog) {
                // doAction(STATE_IDLE);
                //if(GpsBt.instance().isConnected)
                //setResponseMsg(sendLogs(getGPSLog()));
                doAction(STATE_IDLE);
                sendLogs(location.raw_msg);

            } else if (cmd == cmdStopSendGPSLog) {
                doAction(STATE_IDLE);
            }

        } else if (display == gpsForm) {
            if (cmd == cmdSearch) {
                doAction(STATE_SEARCH);
            }
            if (cmd == cmdSelect) {
                int option = choiceGps.getSelectedIndex();
                // any device selected?
                if (option != -1) {
                    // set gps reader to selected device
                    GpsBt.instance().setDevice(
                            BTManager.instance().getServiceURL(option),
                            BTManager.instance().getDeviceName(option));
                    doAction(STATE_READING);
                    // start reading value;
                    GpsBt.instance().start();
                    display(initMainForm());
                }
            } else if (cmd == cmdBack) {
                display(initMainForm());
            }
        }
    }

    public void exit() {
        notifyDestroyed();
    }

    public void display(Displayable display) {
        // shows the display.
        Display.getDisplay(this).setCurrent(display);
    }

    public void display(Alert alert, Displayable next) {
        // shows the alert screen.
        Display.getDisplay(this).setCurrent(alert, next);
    }

    public Command initBackCommand() {
        if (cmdBack == null) {
            cmdBack = new Command("Back", Command.BACK, 1);
        }
        return cmdBack;
    }

    public Displayable initMainForm() {
        if (mainForm == null) {
            mainForm = new Form("Gps Info");

            cmdSearchGps = new Command("Search", Command.ITEM, 1);
            cmdSendGPSLog = new Command("Send to server", Command.OK, 0);
            cmdStopSendGPSLog = new Command("Stop send to server", Command.SCREEN, 0);
            cmdExit = new Command("Exit", Command.EXIT, 1);

            mainForm.addCommand(cmdSendGPSLog);
            mainForm.addCommand(cmdStopSendGPSLog);
            mainForm.addCommand(cmdSearchGps);
            mainForm.addCommand(cmdExit);
            mainForm.setCommandListener(this);

            gpsState = new StringItem("Status", NO_GPS_FOUND);
            quality = new StringItem("Quality", NO_GPS_FOUND);
            latitude = new StringItem("Latitude", NO_GPS_FOUND);
            longitude = new StringItem("Longitude", NO_GPS_FOUND);
            time = new StringItem("Time", "NA");
            satellite = new StringItem("Satellite", NO_GPS_FOUND);
            ackGPSLog = new StringItem("Server response", "$test,133.999,4555,.777644");

            mainForm.append(gpsState);
            mainForm.append(quality);
            mainForm.append(latitude);
            mainForm.append(longitude);
            mainForm.append(time);
            mainForm.append(satellite);
            mainForm.append(ackGPSLog);

            logger = new GPSLogger(this);

        }
        return mainForm;
    }

    public Displayable initGPSForm() {
        if (gpsForm == null) {
            gpsForm = new Form("Gps Search");
            gpsForm.setCommandListener(this);
            cmdSearch = new Command("Search", Command.ITEM, 1);
            gpsForm.addCommand(cmdSearch);
            cmdSelect = new Command("Select", Command.ITEM, 1);
            gpsForm.addCommand(cmdSelect);
            gpsForm.addCommand(initBackCommand());

            choiceGps = new ChoiceGroup("GPS:", ChoiceGroup.EXCLUSIVE);
            gpsForm.append(choiceGps);
        }
        return gpsForm;
    }

    public void doAction(int action) {
        if (thread == null) {
            thread = new Thread(this);
            thread.start();
        }
        state = action;
    }
    Location location;

    public void run() {
        active = true;
        while (active) {
            switch (state) {
                case (STATE_IDLE):
                    try {
                        Thread.sleep(1000);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    break;
                case (STATE_SEARCH):
                    choiceGps.deleteAll();
                    gpsForm.setTicker(new Ticker("Searching devices..."));
                    BTManager.instance().find(BTManager.getRFCOMM_UUID());
                    int size = BTManager.instance().btDevicesFound.size();
                    for (int i = 0; i < size; i++) {
                        choiceGps.append(BTManager.instance().getDeviceName(i), null);
                    }
                    gpsForm.setTicker(null);
                    if (size == 0) {
                        display(new Alert("No devices found"));
                    }
                    doAction(STATE_IDLE);
                    break;
                case (STATE_READING):
                    GpsBt gpsBt = GpsBt.instance();
                    if (gpsBt.isConnected()) {
                        gpsState.setText("Connected");

//                        quality.setText(location.quality + "");
//                        latitude.setText(location.latitude + location.northHemi);
//                        longitude.setText(location.longitude + location.eastHemi);
//                        time.setText(location.utc);
//                        satellite.setText(location.nSat + "");

//                        if (logger.STATE == logger.DONE) {
//                            setResponseMsg(logger.getAnswer());
//                            logger.STATE = logger.PREPARE;
//                        } else if( logger.STATE == logger.PREPARE ){
                        location = gpsBt.getLocation();
                        setGPSLog(location.raw_msg);
                        sendLogs(location.raw_msg);
                        try {
                            Thread.sleep(8888);
                        } catch (InterruptedException e) {
                            e.printStackTrace();
                        }


                    } else {
                        gpsState.setText("Disconnected");
                    }
                    break;
            }
        }
    }

    public StringItem getLatitude() {
        return latitude;
    }

    public StringItem getLongitude() {
        return longitude;
    }

    public StringItem getTime() {
        return time;
    }

    public String getGPSLog() {
        return ackGPSLog.getText();
    }

    public void setGPSLog(String s) {
        ackGPSLog.setText(s);
    }

    public void setResponseMsg(String s) {
        satellite.setText(s);
    }
    private static final String BASE_URL = "http://tantrieuf31.qsh.es";
    private static final String QUERY_URL = BASE_URL + "/log_service.aspx";
    private static boolean DONE = false;

    public void sendLogs(final String msg) {
        DONE = false;
        if(!DONE)
        new Thread() {
            public void run() {
                StringBuffer buffer = null;
                InputStream is = null;
                HttpConnection hc = null;
                InputStreamReader isr = null;
                StringBuffer buf = new StringBuffer();
                buf.append(QUERY_URL);
                buf.append("?raw_msg=");
                buf.append(msg);

                try {
                    hc = (HttpConnection) Connector.open(buf.toString(), Connector.READ);
                    hc.setRequestMethod(HttpConnection.GET);

                    // Read the response from the server
                    is = hc.openInputStream();
                    isr = new InputStreamReader(is, "UTF8");

                    buffer = new StringBuffer();
                    int ch;
                    while ((ch = isr.read()) > -1) {
                        buffer.append((char) ch);
                    }
                    if (isr != null) {
                        isr.close();
                     is.close();
                     hc.close();
                    }
                   
                    ModuleBluetoothGPSMidlet.this.setResponseMsg(buffer.toString());
                    DONE = true;
                } catch (Exception ioe) {
                    ModuleBluetoothGPSMidlet.this.setResponseMsg(ioe.toString());
                }
            }
        }.start();
    }

    private String sendHttpPost(String url) {
        HttpConnection hcon = null;
        DataInputStream dis = null;
        DataOutputStream dos = null;
        StringBuffer responseMessage = new StringBuffer();
        // the request body
        String requeststring = "raw_msg=This ,is a, POST.";

        try {
            // an HttpConnection with both read and write access
            hcon = (HttpConnection) Connector.open(url, Connector.READ_WRITE);

            // set the request method to POST
            hcon.setRequestMethod(HttpConnection.POST);

            // obtain DataOutputStream for sending the request string
            dos = hcon.openDataOutputStream();
            byte[] request_body = requeststring.getBytes();

            // send request string to server
            for (int i = 0; i < request_body.length; i++) {
                dos.writeByte(request_body[i]);
            }//end for( int i = 0; i < request_body.length; i++ )

            // obtain DataInputStream for receiving server response
            dis = new DataInputStream(hcon.openInputStream());

            // retrieve the response from server
            int ch;
            while ((ch = dis.read()) != -1) {
                responseMessage.append((char) ch);
            }//end while( ( ch = dis.read() ) != -1 ) {
        } catch (Exception e) {
            e.printStackTrace();
            responseMessage.append("ERROR");
        } finally {
            // free up i/o streams and http connection
            try {
                if (hcon != null) {
                    hcon.close();
                }
                if (dis != null) {
                    dis.close();
                }
                if (dos != null) {
                    dos.close();
                }
            } catch (IOException ioe) {
                ioe.printStackTrace();
            }//end try/catch
        }//end try/catch/finally
        return responseMessage.toString();
    }//end sendHttpPost( String )
}
