package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisXe
 ***********************************************************************/

import java.util.*;

import com.google.gwt.json.client.JSONNumber;
import com.google.gwt.json.client.JSONObject;
import com.google.gwt.json.client.JSONParser;
import com.google.gwt.json.client.JSONString;
import com.google.gwt.json.client.JSONValue;

import net.ffxml.gwt.json.client.JsonRpc;

/** @pdOid 1d6a662e-db81-4308-a8af-fd4b91b51738 */
public class ThesisXe extends JSONObject implements Jsonizer<ThesisXe> {
	/** @pdOid 4a9ba01c-82f3-4e72-8f19-cc51460a83a8 */
	private long id;
	/** @pdOid e5f61c91-537a-4bdd-8563-e4b57ad67933 */
	private java.lang.String soDangKyXe;
	/** @pdOid 584aa8b4-d03a-4c46-8d57-96b0c79a5b51 */
	private java.lang.String msThietBi;
	/** @pdOid 76ec7a36-144f-47ce-8699-b7b6f44c4562 */
	private int theTichThat;
	/** @pdOid d388022d-dbe2-4f5c-8650-64f564089ead */
	private Date ngayCapNhat;

	/** @pdOid 72121370-df80-4325-9fc6-25ee17db88f6 */
	protected void finalize() {
		// TODO: implement
	}

	/**
	 * @pdRoleInfo migr=no name=ThesisThuocTinhMoRongCuaXe assc=xeCoThuocTinh
	 *             coll=java.util.Collection impl=java.util.HashSet mult=0..*
	 */
	public java.util.Collection<ThesisThuocTinhMoRongCuaXe> thesisThuocTinhMoRongCuaXe;
	/**
	 * @pdRoleInfo migr=no name=ThesisBaoDuongXe assc=baoDuongXe
	 *             coll=java.util.Collection impl=java.util.HashSet mult=0..*
	 */
	public java.util.Collection<ThesisBaoDuongXe> thesisBaoDuongXe;
	/**
	 * @pdRoleInfo migr=no name=ThesisThietBi assc=coThietBi
	 *             coll=java.util.Collection impl=java.util.HashSet mult=0..*
	 */
	public java.util.Collection<ThesisThietBi> thesisThietBi;
	/**
	 * @pdRoleInfo migr=no name=ThesisNhatKiHanhTrinh assc=coHanhTrinh
	 *             coll=java.util.Collection impl=java.util.HashSet mult=0..*
	 */
	public java.util.Collection<ThesisNhatKiHanhTrinh> thesisNhatKiHanhTrinh;
	/**
	 * @pdRoleInfo migr=no name=ThesisLichSuCapNhatXe assc=coCapNhat
	 *             coll=java.util.Collection impl=java.util.HashSet mult=0..*
	 */
	public java.util.Collection<ThesisLichSuCapNhatXe> thesisLichSuCapNhatXe;
	/**
	 * @pdRoleInfo migr=no name=ThesisHopDongThueXe assc=quanLy mult=1..1
	 *             type=Composition
	 */
	public ThesisHopDongThueXe thesisHopDongThueXe;
	/** @pdRoleInfo migr=no name=ThesisModelXe assc=thuocModel mult=0..1 side=A */
	public ThesisModelXe thesisModelXe;

	/** @pdOid 28926a5d-e135-4943-a14c-4253c70bc0f8 */
	public long getId() {
		return id;
	}

	/**
	 * @param newId
	 * @pdOid 7f6b146f-a2d1-48e9-87ae-5c3853b55cb5
	 */
	public void setId(long newId) {
		id = newId;
	}

	/** @pdOid 0109da38-9842-4da5-8bc7-0c3e0c5ac45a */
	public java.lang.String getSoDangKyXe() {
		return soDangKyXe;
	}

	/**
	 * @param newSoDangKyXe
	 * @pdOid 0df8d7e7-acd8-433d-8405-505d0ef63d7f
	 */
	public void setSoDangKyXe(java.lang.String newSoDangKyXe) {
		soDangKyXe = newSoDangKyXe;
	}

	/** @pdOid 1f5c8c02-495d-4dec-81e2-ffc3f086b41e */
	public java.lang.String getMsThietBi() {
		return msThietBi;
	}

	/**
	 * @param newMsThietBi
	 * @pdOid b9abffc2-547e-47ec-95c6-daee2a3b1bfc
	 */
	public void setMsThietBi(java.lang.String newMsThietBi) {
		msThietBi = newMsThietBi;
	}

	/** @pdOid 24f7d974-ed36-480e-9800-0deb175376da */
	public int getTheTichThat() {
		return theTichThat;
	}

	/**
	 * @param newTheTichThat
	 * @pdOid 28809ab5-3de2-4313-9d33-74817bd18bdc
	 */
	public void setTheTichThat(int newTheTichThat) {
		theTichThat = newTheTichThat;
	}

	/** @pdOid 48866d62-b196-4633-80e3-19a8c7aa8b49 */
	public Date getNgayCapNhat() {
		return ngayCapNhat;
	}

	/**
	 * @param newNgayCapNhat
	 * @pdOid 9e45e79e-addf-46bd-9f2b-ff03c2a3db30
	 */
	public void setNgayCapNhat(Date newNgayCapNhat) {
		ngayCapNhat = newNgayCapNhat;
	}

	/** @pdOid 8f5b1fdc-dd68-4d17-b664-ff91bea7b828 */
	public ThesisXe() {
		// TODO: implement
	}

	/** @pdGenerated default getter */
	public java.util.Collection<ThesisThuocTinhMoRongCuaXe> getThesisThuocTinhMoRongCuaXe() {
		if (thesisThuocTinhMoRongCuaXe == null)
			thesisThuocTinhMoRongCuaXe = new java.util.HashSet<ThesisThuocTinhMoRongCuaXe>();
		return thesisThuocTinhMoRongCuaXe;
	}

	/** @pdGenerated default iterator getter */
	public java.util.Iterator getIteratorThesisThuocTinhMoRongCuaXe() {
		if (thesisThuocTinhMoRongCuaXe == null)
			thesisThuocTinhMoRongCuaXe = new java.util.HashSet<ThesisThuocTinhMoRongCuaXe>();
		return thesisThuocTinhMoRongCuaXe.iterator();
	}

	/**
	 * @pdGenerated default setter
	 * @param newThesisThuocTinhMoRongCuaXe
	 */
	public void setThesisThuocTinhMoRongCuaXe(
			java.util.Collection<ThesisThuocTinhMoRongCuaXe> newThesisThuocTinhMoRongCuaXe) {
		removeAllThesisThuocTinhMoRongCuaXe();
		for (java.util.Iterator iter = newThesisThuocTinhMoRongCuaXe.iterator(); iter
				.hasNext();)
			addThesisThuocTinhMoRongCuaXe((ThesisThuocTinhMoRongCuaXe) iter
					.next());
	}

	/**
	 * @pdGenerated default add
	 * @param newThesisThuocTinhMoRongCuaXe
	 */
	public void addThesisThuocTinhMoRongCuaXe(
			ThesisThuocTinhMoRongCuaXe newThesisThuocTinhMoRongCuaXe) {
		if (newThesisThuocTinhMoRongCuaXe == null)
			return;
		if (this.thesisThuocTinhMoRongCuaXe == null)
			this.thesisThuocTinhMoRongCuaXe = new java.util.HashSet<ThesisThuocTinhMoRongCuaXe>();
		if (!this.thesisThuocTinhMoRongCuaXe
				.contains(newThesisThuocTinhMoRongCuaXe)) {
			this.thesisThuocTinhMoRongCuaXe.add(newThesisThuocTinhMoRongCuaXe);
			newThesisThuocTinhMoRongCuaXe.setThesisXe(this);
		}
	}

	/**
	 * @pdGenerated default remove
	 * @param oldThesisThuocTinhMoRongCuaXe
	 */
	public void removeThesisThuocTinhMoRongCuaXe(
			ThesisThuocTinhMoRongCuaXe oldThesisThuocTinhMoRongCuaXe) {
		if (oldThesisThuocTinhMoRongCuaXe == null)
			return;
		if (this.thesisThuocTinhMoRongCuaXe != null)
			if (this.thesisThuocTinhMoRongCuaXe
					.contains(oldThesisThuocTinhMoRongCuaXe)) {
				this.thesisThuocTinhMoRongCuaXe
						.remove(oldThesisThuocTinhMoRongCuaXe);
				oldThesisThuocTinhMoRongCuaXe.setThesisXe((ThesisXe) null);
			}
	}

	/** @pdGenerated default removeAll */
	public void removeAllThesisThuocTinhMoRongCuaXe() {
		if (thesisThuocTinhMoRongCuaXe != null) {
			ThesisThuocTinhMoRongCuaXe oldThesisThuocTinhMoRongCuaXe;
			for (java.util.Iterator iter = getIteratorThesisThuocTinhMoRongCuaXe(); iter
					.hasNext();) {
				oldThesisThuocTinhMoRongCuaXe = (ThesisThuocTinhMoRongCuaXe) iter
						.next();
				iter.remove();
				oldThesisThuocTinhMoRongCuaXe.setThesisXe((ThesisXe) null);
			}
		}
	}

	/** @pdGenerated default getter */
	public java.util.Collection<ThesisBaoDuongXe> getThesisBaoDuongXe() {
		if (thesisBaoDuongXe == null)
			thesisBaoDuongXe = new java.util.HashSet<ThesisBaoDuongXe>();
		return thesisBaoDuongXe;
	}

	/** @pdGenerated default iterator getter */
	public java.util.Iterator getIteratorThesisBaoDuongXe() {
		if (thesisBaoDuongXe == null)
			thesisBaoDuongXe = new java.util.HashSet<ThesisBaoDuongXe>();
		return thesisBaoDuongXe.iterator();
	}

	/**
	 * @pdGenerated default setter
	 * @param newThesisBaoDuongXe
	 */
	public void setThesisBaoDuongXe(
			java.util.Collection<ThesisBaoDuongXe> newThesisBaoDuongXe) {
		removeAllThesisBaoDuongXe();
		for (java.util.Iterator iter = newThesisBaoDuongXe.iterator(); iter
				.hasNext();)
			addThesisBaoDuongXe((ThesisBaoDuongXe) iter.next());
	}

	/**
	 * @pdGenerated default add
	 * @param newThesisBaoDuongXe
	 */
	public void addThesisBaoDuongXe(ThesisBaoDuongXe newThesisBaoDuongXe) {
		if (newThesisBaoDuongXe == null)
			return;
		if (this.thesisBaoDuongXe == null)
			this.thesisBaoDuongXe = new java.util.HashSet<ThesisBaoDuongXe>();
		if (!this.thesisBaoDuongXe.contains(newThesisBaoDuongXe)) {
			this.thesisBaoDuongXe.add(newThesisBaoDuongXe);
			newThesisBaoDuongXe.setThesisXe(this);
		}
	}

	/**
	 * @pdGenerated default remove
	 * @param oldThesisBaoDuongXe
	 */
	public void removeThesisBaoDuongXe(ThesisBaoDuongXe oldThesisBaoDuongXe) {
		if (oldThesisBaoDuongXe == null)
			return;
		if (this.thesisBaoDuongXe != null)
			if (this.thesisBaoDuongXe.contains(oldThesisBaoDuongXe)) {
				this.thesisBaoDuongXe.remove(oldThesisBaoDuongXe);
				oldThesisBaoDuongXe.setThesisXe((ThesisXe) null);
			}
	}

	/** @pdGenerated default removeAll */
	public void removeAllThesisBaoDuongXe() {
		if (thesisBaoDuongXe != null) {
			ThesisBaoDuongXe oldThesisBaoDuongXe;
			for (java.util.Iterator iter = getIteratorThesisBaoDuongXe(); iter
					.hasNext();) {
				oldThesisBaoDuongXe = (ThesisBaoDuongXe) iter.next();
				iter.remove();
				oldThesisBaoDuongXe.setThesisXe((ThesisXe) null);
			}
		}
	}

	/** @pdGenerated default getter */
	public java.util.Collection<ThesisThietBi> getThesisThietBi() {
		if (thesisThietBi == null)
			thesisThietBi = new java.util.HashSet<ThesisThietBi>();
		return thesisThietBi;
	}

	/** @pdGenerated default iterator getter */
	public java.util.Iterator getIteratorThesisThietBi() {
		if (thesisThietBi == null)
			thesisThietBi = new java.util.HashSet<ThesisThietBi>();
		return thesisThietBi.iterator();
	}

	/**
	 * @pdGenerated default setter
	 * @param newThesisThietBi
	 */
	public void setThesisThietBi(
			java.util.Collection<ThesisThietBi> newThesisThietBi) {
		removeAllThesisThietBi();
		for (java.util.Iterator iter = newThesisThietBi.iterator(); iter
				.hasNext();)
			addThesisThietBi((ThesisThietBi) iter.next());
	}

	/**
	 * @pdGenerated default add
	 * @param newThesisThietBi
	 */
	public void addThesisThietBi(ThesisThietBi newThesisThietBi) {
		if (newThesisThietBi == null)
			return;
		if (this.thesisThietBi == null)
			this.thesisThietBi = new java.util.HashSet<ThesisThietBi>();
		if (!this.thesisThietBi.contains(newThesisThietBi)) {
			this.thesisThietBi.add(newThesisThietBi);
			newThesisThietBi.setThesisXe(this);
		}
	}

	/**
	 * @pdGenerated default remove
	 * @param oldThesisThietBi
	 */
	public void removeThesisThietBi(ThesisThietBi oldThesisThietBi) {
		if (oldThesisThietBi == null)
			return;
		if (this.thesisThietBi != null)
			if (this.thesisThietBi.contains(oldThesisThietBi)) {
				this.thesisThietBi.remove(oldThesisThietBi);
				oldThesisThietBi.setThesisXe((ThesisXe) null);
			}
	}

	/** @pdGenerated default removeAll */
	public void removeAllThesisThietBi() {
		if (thesisThietBi != null) {
			ThesisThietBi oldThesisThietBi;
			for (java.util.Iterator iter = getIteratorThesisThietBi(); iter
					.hasNext();) {
				oldThesisThietBi = (ThesisThietBi) iter.next();
				iter.remove();
				oldThesisThietBi.setThesisXe((ThesisXe) null);
			}
		}
	}

	/** @pdGenerated default getter */
	public java.util.Collection<ThesisNhatKiHanhTrinh> getThesisNhatKiHanhTrinh() {
		if (thesisNhatKiHanhTrinh == null)
			thesisNhatKiHanhTrinh = new java.util.HashSet<ThesisNhatKiHanhTrinh>();
		return thesisNhatKiHanhTrinh;
	}

	/** @pdGenerated default iterator getter */
	public java.util.Iterator getIteratorThesisNhatKiHanhTrinh() {
		if (thesisNhatKiHanhTrinh == null)
			thesisNhatKiHanhTrinh = new java.util.HashSet<ThesisNhatKiHanhTrinh>();
		return thesisNhatKiHanhTrinh.iterator();
	}

	/**
	 * @pdGenerated default setter
	 * @param newThesisNhatKiHanhTrinh
	 */
	public void setThesisNhatKiHanhTrinh(
			java.util.Collection<ThesisNhatKiHanhTrinh> newThesisNhatKiHanhTrinh) {
		removeAllThesisNhatKiHanhTrinh();
		for (java.util.Iterator iter = newThesisNhatKiHanhTrinh.iterator(); iter
				.hasNext();)
			addThesisNhatKiHanhTrinh((ThesisNhatKiHanhTrinh) iter.next());
	}

	/**
	 * @pdGenerated default add
	 * @param newThesisNhatKiHanhTrinh
	 */
	public void addThesisNhatKiHanhTrinh(
			ThesisNhatKiHanhTrinh newThesisNhatKiHanhTrinh) {
		if (newThesisNhatKiHanhTrinh == null)
			return;
		if (this.thesisNhatKiHanhTrinh == null)
			this.thesisNhatKiHanhTrinh = new java.util.HashSet<ThesisNhatKiHanhTrinh>();
		if (!this.thesisNhatKiHanhTrinh.contains(newThesisNhatKiHanhTrinh)) {
			this.thesisNhatKiHanhTrinh.add(newThesisNhatKiHanhTrinh);
			newThesisNhatKiHanhTrinh.setThesisXe(this);
		}
	}

	/**
	 * @pdGenerated default remove
	 * @param oldThesisNhatKiHanhTrinh
	 */
	public void removeThesisNhatKiHanhTrinh(
			ThesisNhatKiHanhTrinh oldThesisNhatKiHanhTrinh) {
		if (oldThesisNhatKiHanhTrinh == null)
			return;
		if (this.thesisNhatKiHanhTrinh != null)
			if (this.thesisNhatKiHanhTrinh.contains(oldThesisNhatKiHanhTrinh)) {
				this.thesisNhatKiHanhTrinh.remove(oldThesisNhatKiHanhTrinh);
				oldThesisNhatKiHanhTrinh.setThesisXe((ThesisXe) null);
			}
	}

	/** @pdGenerated default removeAll */
	public void removeAllThesisNhatKiHanhTrinh() {
		if (thesisNhatKiHanhTrinh != null) {
			ThesisNhatKiHanhTrinh oldThesisNhatKiHanhTrinh;
			for (java.util.Iterator iter = getIteratorThesisNhatKiHanhTrinh(); iter
					.hasNext();) {
				oldThesisNhatKiHanhTrinh = (ThesisNhatKiHanhTrinh) iter.next();
				iter.remove();
				oldThesisNhatKiHanhTrinh.setThesisXe((ThesisXe) null);
			}
		}
	}

	/** @pdGenerated default getter */
	public java.util.Collection<ThesisLichSuCapNhatXe> getThesisLichSuCapNhatXe() {
		if (thesisLichSuCapNhatXe == null)
			thesisLichSuCapNhatXe = new java.util.HashSet<ThesisLichSuCapNhatXe>();
		return thesisLichSuCapNhatXe;
	}

	/** @pdGenerated default iterator getter */
	public java.util.Iterator getIteratorThesisLichSuCapNhatXe() {
		if (thesisLichSuCapNhatXe == null)
			thesisLichSuCapNhatXe = new java.util.HashSet<ThesisLichSuCapNhatXe>();
		return thesisLichSuCapNhatXe.iterator();
	}

	/**
	 * @pdGenerated default setter
	 * @param newThesisLichSuCapNhatXe
	 */
	public void setThesisLichSuCapNhatXe(
			java.util.Collection<ThesisLichSuCapNhatXe> newThesisLichSuCapNhatXe) {
		removeAllThesisLichSuCapNhatXe();
		for (java.util.Iterator iter = newThesisLichSuCapNhatXe.iterator(); iter
				.hasNext();)
			addThesisLichSuCapNhatXe((ThesisLichSuCapNhatXe) iter.next());
	}

	/**
	 * @pdGenerated default add
	 * @param newThesisLichSuCapNhatXe
	 */
	public void addThesisLichSuCapNhatXe(
			ThesisLichSuCapNhatXe newThesisLichSuCapNhatXe) {
		if (newThesisLichSuCapNhatXe == null)
			return;
		if (this.thesisLichSuCapNhatXe == null)
			this.thesisLichSuCapNhatXe = new java.util.HashSet<ThesisLichSuCapNhatXe>();
		if (!this.thesisLichSuCapNhatXe.contains(newThesisLichSuCapNhatXe)) {
			this.thesisLichSuCapNhatXe.add(newThesisLichSuCapNhatXe);
			newThesisLichSuCapNhatXe.setThesisXe(this);
		}
	}

	/**
	 * @pdGenerated default remove
	 * @param oldThesisLichSuCapNhatXe
	 */
	public void removeThesisLichSuCapNhatXe(
			ThesisLichSuCapNhatXe oldThesisLichSuCapNhatXe) {
		if (oldThesisLichSuCapNhatXe == null)
			return;
		if (this.thesisLichSuCapNhatXe != null)
			if (this.thesisLichSuCapNhatXe.contains(oldThesisLichSuCapNhatXe)) {
				this.thesisLichSuCapNhatXe.remove(oldThesisLichSuCapNhatXe);
				oldThesisLichSuCapNhatXe.setThesisXe((ThesisXe) null);
			}
	}

	/** @pdGenerated default removeAll */
	public void removeAllThesisLichSuCapNhatXe() {
		if (thesisLichSuCapNhatXe != null) {
			ThesisLichSuCapNhatXe oldThesisLichSuCapNhatXe;
			for (java.util.Iterator iter = getIteratorThesisLichSuCapNhatXe(); iter
					.hasNext();) {
				oldThesisLichSuCapNhatXe = (ThesisLichSuCapNhatXe) iter.next();
				iter.remove();
				oldThesisLichSuCapNhatXe.setThesisXe((ThesisXe) null);
			}
		}
	}

	/** @pdGenerated default parent getter */
	public ThesisModelXe getThesisModelXe() {
		return thesisModelXe;
	}

	/**
	 * @pdGenerated default parent setter
	 * @param newThesisModelXe
	 */
	public void setThesisModelXe(ThesisModelXe newThesisModelXe) {
		if (this.thesisModelXe == null
				|| !this.thesisModelXe.equals(newThesisModelXe)) {
			if (this.thesisModelXe != null) {
				ThesisModelXe oldThesisModelXe = this.thesisModelXe;
				this.thesisModelXe = null;
				oldThesisModelXe.removeThesisXe(this);
			}
			if (newThesisModelXe != null) {
				this.thesisModelXe = newThesisModelXe;
				this.thesisModelXe.addThesisXe(this);
			}
		}
	}

	public String toJson() {	
		this.put("soDangKyXe", new JSONString(soDangKyXe));
		this.put("msThietBi", new JSONString(msThietBi));
		this.put("theTichThat", new JSONNumber(theTichThat));
		this.put("ngayCapNhat",  new JSONNumber(ngayCapNhat.getTime()));
		return this.toString();
	}

	public ThesisXe fromJson(String json) {
		JSONObject object = JsonUtils.toObject(json);
		if (object != null) {
			this.id = JsonUtils.toNumber(object.get("id")).longValue();
			this.msThietBi = JsonUtils.toString(object.get("msThietBi"));
			this.ngayCapNhat = JsonUtils.toDate(object.get("ngayCapNhat"));
			this.soDangKyXe = JsonUtils.toString(object.get("soDangKyXe"));
			return this;
		}
		return null;
	}

}