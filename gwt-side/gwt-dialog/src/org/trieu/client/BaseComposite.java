package org.trieu.client;

import org.gwm.client.GInternalFrame;

import com.google.gwt.user.client.ui.Composite;

public class BaseComposite extends Composite {
	private GInternalFrame internalFrame;

	public BaseComposite(GInternalFrame internalFrame) {
		this.internalFrame = internalFrame;
	}

	public GInternalFrame getInternalFrame() {
		return internalFrame;
	}

	public void setInternalFrame(GInternalFrame internalFrame) {
		this.internalFrame = internalFrame;
	}

}