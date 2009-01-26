package org.trieu.client.model;

import java.util.Date;

import com.smartgwt.client.widgets.grid.ListGridRecord;

public class ThesisXeRecord extends ListGridRecord{
	private long id;

	private java.lang.String soDangKyXe;

	private java.lang.String msThietBi;

	private int theTichThat;

	private Date ngayCapNhat;

	public long getId() {
		return id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public java.lang.String getSoDangKyXe() {
		return soDangKyXe;
	}

	public void setSoDangKyXe(java.lang.String soDangKyXe) {
		this.soDangKyXe = soDangKyXe;
	}

	public java.lang.String getMsThietBi() {
		return msThietBi;
	}

	public void setMsThietBi(java.lang.String msThietBi) {
		this.msThietBi = msThietBi;
	}

	public int getTheTichThat() {
		return theTichThat;
	}

	public void setTheTichThat(int theTichThat) {
		this.theTichThat = theTichThat;
	}

	public Date getNgayCapNhat() {
		return ngayCapNhat;
	}

	public void setNgayCapNhat(Date ngayCapNhat) {
		this.ngayCapNhat = ngayCapNhat;
	}


}
