package org.trieu.client;

import org.gwm.client.GDesktopPane;
import org.gwm.client.GInternalFrame;
import org.gwm.client.impl.DefaultGDesktopPane;
import org.gwm.client.impl.DefaultGInternalFrame;

import com.google.gwt.core.client.EntryPoint;
import com.google.gwt.user.client.Window;
import com.google.gwt.user.client.ui.Composite;
import com.google.gwt.user.client.ui.RootPanel;
import com.google.gwt.user.client.ui.Widget;

public class WindowsManager implements EntryPoint {
	private static GDesktopPane desktop;
	private static MenuBarCPS menuBarCPS;
	
	public void onModuleLoad() {
		RootPanel rootPanel = RootPanel.get();
		PHPRFC4GWT.dispatcherURL = "http://localhost/vehicle/index.php/";
		

        desktop = new DefaultGDesktopPane();        
        RootPanel.get().add((Widget) desktop, 0, 0);
        
       // GInternalFrame bar = new DefaultGInternalFrame();
        menuBarCPS = new MenuBarCPS(desktop);
        desktop.addWidget(menuBarCPS, 5, 2);
//        bar.setContent(menuBarCPS);
//        bar.setSize(menuBarCPS.getOffsetWidth(), menuBarCPS.getOffsetHeight());
//        bar.setLocation(5, 5);
//        bar.setClosable(false);
//        bar.setMaximizable(false);
//        bar.setDraggable(false);
//        bar.setResizable(false);
//        desktop.addFrame(bar);       
       
       // bar.setVisible(true);
        
       
        
	}

}
