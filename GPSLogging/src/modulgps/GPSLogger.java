/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package modulgps;

import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;

import javax.microedition.io.Connector;
import javax.microedition.io.HttpConnection;

/**
 *
 * @author Trieu Nguyen
 */

//test url http://tantrieuf31.qsh.es/log_service.aspx?raw_msg=123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47
public class GPSLogger implements Runnable {

    public GPSLogger(ModuleBluetoothGPSMidlet midlet) {
        this.midlet = midlet;
    }
    private ModuleBluetoothGPSMidlet midlet;
    private static final String BASE_URL = "http://tantrieuf31.qsh.es";
    private static final String QUERY_URL = BASE_URL + "/log_service.aspx";
    private String message = "123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47";
    private String answer = "No answer";
    public static int STATE = 0;
    public static int PREPARE = 0;
    public static int SENDING = 1;
    public static int DONE = 2;

    public void setMessage(String message) {
        this.message = message;
        STATE = PREPARE;
    }

    public String getAnswer() {
        return answer;
    }

    public void sendMessage() {
        if (STATE == PREPARE) {
            STATE = SENDING;
            Thread thread = new Thread(this);
            thread.start();
        }
    }

    //Retrieve a grade.
    void send2(String url, String params) throws IOException {
        HttpConnection c = null;
        InputStream is = null;
        OutputStream os = null;
        StringBuffer b = new StringBuffer();
        try {
            c = (HttpConnection) Connector.open(url);
            c.setRequestMethod(HttpConnection.POST);

            c.setRequestProperty("User-Agent", "Profile/MIDP-1.0 Configuration/CLDC-2.0");

            os = c.openOutputStream();

            // send request to the CGI script
            //  String str = "name=163748";
            byte postmsg[] = params.getBytes();
            for (int i = 0; i < postmsg.length; i++) {
                os.write(postmsg[i]);
            }
            os.flush();

            //receive response and display in a text box.
            is = c.openDataInputStream();
            int ch;
            while ((ch = is.read()) != -1) {
                b.append((char) ch);
                System.out.println((char) ch);
            }


        } finally {
            if (is != null) {
                is.close();
            }
            if (os != null) {
                os.close();
            }
            if (c != null) {
                c.close();
            }
        }

    }

    private HttpConnection openConnection(String url, String requestMethod) throws IOException {
        HttpConnection c;
        int status = -1;

        // Open the connection and check for redirects
        while (true) {
            System.out.println(url);
            c = (HttpConnection) Connector.open(url);
            c.setRequestMethod(requestMethod);

            // Get the status code, causing the connection to be made
            status = c.getResponseCode();

            if ((status == HttpConnection.HTTP_TEMP_REDIRECT) || (status == HttpConnection.HTTP_MOVED_TEMP) || (status == HttpConnection.HTTP_MOVED_PERM)) {
                // Get the new location and close the connection
                url = c.getHeaderField("Location");
                c = (HttpConnection) Connector.open(url);
            //c.close();
            } else {
                break;
            }
        }

        // Only HTTP_OK (200) means the content is returned.
        if (status != HttpConnection.HTTP_OK) {
            c.close();
            throw new IOException("Response status not OK");
        }
        return c;
    }
    //FORMAT1 : http://tantrieuf31.qsh.es/log_service.aspx?lat=10.334&lng=106.11212
    //FORMAT1 : http://tantrieuf31.qsh.es/log_service.aspx?raw_msg=$GPGGA,123519,4807.038,N,01131.000,E,1,08,0.9,545.4,M,46.9,M,,*47
    HttpConnection hc = null;
    StringBuffer buffer = new StringBuffer();
    InputStream is = null;
    InputStreamReader isr = null;

    public void send() {

        StringBuffer buf = new StringBuffer();
        buf.append(QUERY_URL);
        buf.append("?raw_msg=");
        buf.append(urlEncode(message));
        //midlet.getLatitude().setText(buf.toString());

        try {

            hc = openConnection(buf.toString(), HttpConnection.GET);

            // Read the response from the server
            is = hc.openInputStream();
            isr = new InputStreamReader(is, "UTF8");

            int ch;
            while ((ch = isr.read()) > -1) {
                buffer.append((char) ch);
            }
            if (isr != null) {
                isr.close();
            }
            is.close();
            isr.close();
            hc.close();
        } catch (Exception ioe) {
            midlet.setResponseMsg(ioe.toString());
        }

//        answer = buffer.toString();
         midlet.getLongitude().setText(buffer.toString());

        STATE = DONE;
    }

    public void run() {
        send();
    }

    static public String urlEncode(String sUrl) {
        StringBuffer urlOK = new StringBuffer();
        for (int i = 0; i < sUrl.length(); i++) {
            char ch = sUrl.charAt(i);
            switch (ch) {
                case '<':
                    urlOK.append("%3C");
                    break;
                case '>':
                    urlOK.append("%3E");
                    break;
                case '/':
                    urlOK.append("%2F");
                    break;
                case ' ':
                    urlOK.append("%20");
                    break;
                case ':':
                    urlOK.append("%3A");
                    break;
                case '-':
                    urlOK.append("%2D");
                    break;
                default:
                    urlOK.append(ch);
                    break;
            }
        }
        return urlOK.toString();
    }
}
