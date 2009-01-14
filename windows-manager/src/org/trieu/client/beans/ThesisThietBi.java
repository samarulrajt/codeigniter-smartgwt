package org.trieu.client.beans;

import com.google.gwt.json.client.JSONNumber;
import com.google.gwt.json.client.JSONObject;
import com.google.gwt.json.client.JSONString;

/** @pdOid cc73811c-1f84-4884-87de-073cb935ec02 */
public class ThesisThietBi extends JSONObject {

	private JSONNumber id;

	private JSONString msThietBi;

	private JSONString tenThietBi;

	private JSONString loaiThietBi;


	public ThesisThietBi() {
		setId(0);
		setLoaiThietBi("");
		setMsThietBi("");
		setTenThietBi("");
	}

	public ThesisThietBi(long id, String loaiThietBi, String msThietBi,	String tenThietBi) {
		super();
		setId(id);
		setLoaiThietBi(loaiThietBi);
		setMsThietBi(msThietBi);
		setTenThietBi(tenThietBi);
	}

	public JSONNumber getId() {
		return id;
	}

	public JSONString getMsThietBi() {
		return msThietBi;
	}

	public JSONString getTenThietBi() {
		return tenThietBi;
	}

	public JSONString getLoaiThietBi() {
		return loaiThietBi;
	}



	public void setId(long id) {
		this.id = new JSONNumber(id);
		this.put("id", this.id);
	}

	public void setMsThietBi(String msThietBi) {
		this.msThietBi = new JSONString(msThietBi);
		this.put("msThietBi", this.msThietBi);
	}

	public void setTenThietBi(String tenThietBi) {
		this.tenThietBi = new JSONString(tenThietBi);
		this.put("tenThietBi", this.tenThietBi);
	}

	public void setLoaiThietBi(String loaiThietBi) {
		this.loaiThietBi = new JSONString(loaiThietBi);
		this.put("loaiThietBi", this.loaiThietBi);
	}





	/** @pdRoleInfo migr=no name=ThesisXe assc=coThietBi mult=0..1 side=A */
	public ThesisXe thesisXe;

	/** @pdGenerated default parent getter */
	public ThesisXe getThesisXe() {
		return thesisXe;
	}

	/**
	 * @pdGenerated default parent setter
	 * @param newThesisXe
	 */
	public void setThesisXe(ThesisXe newThesisXe) {
		if (this.thesisXe == null || !this.thesisXe.equals(newThesisXe)) {
			if (this.thesisXe != null) {
				ThesisXe oldThesisXe = this.thesisXe;
				this.thesisXe = null;
				oldThesisXe.removeThesisThietBi(this);
			}
			if (newThesisXe != null) {
				this.thesisXe = newThesisXe;
				this.thesisXe.addThesisThietBi(this);
			}
		}
	}

}