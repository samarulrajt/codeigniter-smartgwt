package org.trieu.client.model;

/***********************************************************************
 * Module:  ThesisModelXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisModelXe
 ***********************************************************************/

import java.util.*;

import net.ffxml.gwt.json.client.JsonRpc;

import com.google.gwt.json.client.JSONObject;

/** @pdOid 56e0cbc3-ef0c-4eba-a3b1-39039efd700c */
public class ThesisModelXe implements Jsonizer<ThesisModelXe> {
	/** @pdOid 12dee015-efc0-4172-b46f-b2bbe7f8c11d */
	private long id;
	/** @pdOid bf340257-c4a3-4230-ad6e-b3e99a6b454a */
	private java.lang.String msModelXe;
	/** @pdOid c622f0e4-8665-41b7-bc85-cf51db8a92e0 */
	private java.lang.String loaiModel;
	/** @pdOid a80d3268-5a0c-4417-951d-6c0bdd2f868e */
	private java.lang.String nhanHieu;
	/** @pdOid 80196cfd-9d86-403d-a292-89d067378fbe */
	private java.lang.String msThue;
	/** @pdOid 20a941dc-dd54-44e0-9c89-0d732726c24b */
	private java.lang.String nhienLieu;
	/** @pdOid cbec2b9c-b795-4758-9c62-c27edcb6cc6a */
	private double ptac;
	/** @pdOid 3fc6ef8c-f449-4f0d-8fa8-e9f756016497 */
	private double trongTai;
	/** @pdOid 1d590b3b-ae83-4f25-a356-60f6e4d7655b */
	private float dienTichSan;
	/** @pdOid d4d3af6c-d35a-40e6-b045-47a28778157c */
	private java.lang.String loaiXe;
	/** @pdOid 93351a65-0c8c-48a0-ab5d-44c651578cc7 */
	private java.lang.String soSuon;
	/** @pdOid c55c0799-f177-4d6c-8d86-c101ec7eadae */
	private double soKmDaDi;

	/**
	 * @pdRoleInfo migr=no name=ThesisXe assc=thuocModel
	 *             coll=java.util.Collection impl=java.util.HashSet mult=0..*
	 */
	public java.util.Collection<ThesisXe> thesisXe;

	/** @pdOid 586ea33e-b120-45c4-8890-29461e4ce07e */
	public long getId() {
		return id;
	}

	/**
	 * @param newId
	 * @pdOid 5cea52ab-2498-4101-b810-34d913bc8be9
	 */
	public void setId(long newId) {
		id = newId;
	}

	/** @pdOid 5562c2c0-59b5-4a2b-9c19-b94062ddb838 */
	public java.lang.String getMsModelXe() {
		return msModelXe;
	}

	/**
	 * @param newMsModelXe
	 * @pdOid 2a90289e-45bb-4625-9e7b-307c3889e0d8
	 */
	public void setMsModelXe(java.lang.String newMsModelXe) {
		msModelXe = newMsModelXe;
	}

	/** @pdOid 9f96ee18-5fa8-401c-8593-b42ee8885a0d */
	public java.lang.String getLoaiModel() {
		return loaiModel;
	}

	/**
	 * @param newLoaiModel
	 * @pdOid ab863c9a-7a92-48e8-8505-422e7c42823c
	 */
	public void setLoaiModel(java.lang.String newLoaiModel) {
		loaiModel = newLoaiModel;
	}

	/** @pdOid 3a37d432-a1a5-420f-bc19-95f2670a67de */
	public java.lang.String getNhanHieu() {
		return nhanHieu;
	}

	/**
	 * @param newNhanHieu
	 * @pdOid 8b98699a-5d90-4c5e-94b6-a2260fefb852
	 */
	public void setNhanHieu(java.lang.String newNhanHieu) {
		nhanHieu = newNhanHieu;
	}

	/** @pdOid e88c33fc-9bdc-4da0-b9d5-f46fead8b0e1 */
	public java.lang.String getMsThue() {
		return msThue;
	}

	/**
	 * @param newMsThue
	 * @pdOid c27dd0f6-401e-4212-bc84-2a328aff7e10
	 */
	public void setMsThue(java.lang.String newMsThue) {
		msThue = newMsThue;
	}

	/** @pdOid f52eff4a-38f9-4a1c-b826-2266b55d9081 */
	public java.lang.String getNhienLieu() {
		return nhienLieu;
	}

	/**
	 * @param newNhienLieu
	 * @pdOid ad43b6b1-9694-4943-a144-eaf8973093ce
	 */
	public void setNhienLieu(java.lang.String newNhienLieu) {
		nhienLieu = newNhienLieu;
	}

	/** @pdOid f9de13ed-73bc-4efe-bb83-06550c4336d9 */
	public double getPtac() {
		return ptac;
	}

	/**
	 * @param newPtac
	 * @pdOid 256e380e-60e3-4a22-96ea-b35d0e22856c
	 */
	public void setPtac(double newPtac) {
		ptac = newPtac;
	}

	/** @pdOid cc599a25-93cd-454c-9c79-a07c6992d9fe */
	public double getTrongTai() {
		return trongTai;
	}

	/**
	 * @param newTrongTai
	 * @pdOid 186914cb-83d7-4511-a67b-42762616e3a8
	 */
	public void setTrongTai(double newTrongTai) {
		trongTai = newTrongTai;
	}

	/** @pdOid 73364775-fd70-40a9-8cbf-90dcd04e63bf */
	public float getDienTichSan() {
		return dienTichSan;
	}

	/**
	 * @param newDienTichSan
	 * @pdOid 7f32d713-4134-40a4-9abd-981c4dd32e1f
	 */
	public void setDienTichSan(float newDienTichSan) {
		dienTichSan = newDienTichSan;
	}

	/** @pdOid fd88c3bd-8b66-4c0e-b7ee-ff1e878a2563 */
	public java.lang.String getLoaiXe() {
		return loaiXe;
	}

	/**
	 * @param newLoaiXe
	 * @pdOid c9d5ed36-82c8-4d23-81af-4c6dd6362972
	 */
	public void setLoaiXe(java.lang.String newLoaiXe) {
		loaiXe = newLoaiXe;
	}

	/** @pdOid 86753765-1cd7-40a0-b7d2-3cd4be70d4b1 */
	public java.lang.String getSoSuon() {
		return soSuon;
	}

	/**
	 * @param newSoSuon
	 * @pdOid cd761739-479e-4592-bd90-60bc63b3a075
	 */
	public void setSoSuon(java.lang.String newSoSuon) {
		soSuon = newSoSuon;
	}

	/** @pdOid fb83c220-cb11-482e-884b-858dd134c4f1 */
	public double getSoKmDaDi() {
		return soKmDaDi;
	}

	/**
	 * @param newSoKmDaDi
	 * @pdOid 1f6eaf33-bb56-4450-885a-4c48d29927fe
	 */
	public void setSoKmDaDi(double newSoKmDaDi) {
		soKmDaDi = newSoKmDaDi;
	}

	/** @pdGenerated default getter */
	public java.util.Collection<ThesisXe> getThesisXe() {
		if (thesisXe == null)
			thesisXe = new java.util.HashSet<ThesisXe>();
		return thesisXe;
	}

	/** @pdGenerated default iterator getter */
	public java.util.Iterator getIteratorThesisXe() {
		if (thesisXe == null)
			thesisXe = new java.util.HashSet<ThesisXe>();
		return thesisXe.iterator();
	}

	/**
	 * @pdGenerated default setter
	 * @param newThesisXe
	 */
	public void setThesisXe(java.util.Collection<ThesisXe> newThesisXe) {
		removeAllThesisXe();
		for (java.util.Iterator iter = newThesisXe.iterator(); iter.hasNext();)
			addThesisXe((ThesisXe) iter.next());
	}

	/**
	 * @pdGenerated default add
	 * @param newThesisXe
	 */
	public void addThesisXe(ThesisXe newThesisXe) {
		if (newThesisXe == null)
			return;
		if (this.thesisXe == null)
			this.thesisXe = new java.util.HashSet<ThesisXe>();
		if (!this.thesisXe.contains(newThesisXe)) {
			this.thesisXe.add(newThesisXe);
			newThesisXe.setThesisModelXe(this);
		}
	}

	/**
	 * @pdGenerated default remove
	 * @param oldThesisXe
	 */
	public void removeThesisXe(ThesisXe oldThesisXe) {
		if (oldThesisXe == null)
			return;
		if (this.thesisXe != null)
			if (this.thesisXe.contains(oldThesisXe)) {
				this.thesisXe.remove(oldThesisXe);
				oldThesisXe.setThesisModelXe((ThesisModelXe) null);
			}
	}

	/** @pdGenerated default removeAll */
	public void removeAllThesisXe() {
		if (thesisXe != null) {
			ThesisXe oldThesisXe;
			for (java.util.Iterator iter = getIteratorThesisXe(); iter
					.hasNext();) {
				oldThesisXe = (ThesisXe) iter.next();
				iter.remove();
				oldThesisXe.setThesisModelXe((ThesisModelXe) null);
			}
		}
	}

	
	public ThesisModelXe fromJson(String json) {
		JSONObject object = JsonUtils.toObject(json);
		if (object != null) {
			this.id = JsonUtils.toNumber(object.get("id")).longValue();
			this.msModelXe = JsonUtils.toString(object.get("msModelXe"));
			this.loaiModel = JsonUtils.toString(object.get("loaiModel"));
			this.nhanHieu = JsonUtils.toString(object.get("nhanHieu"));
			this.msThue = JsonUtils.toString(object.get("msThue"));
			this.nhienLieu = JsonUtils.toString(object.get("nhienLieu"));
			this.ptac = JsonUtils.toNumber(object.get("ptac"));
			this.trongTai = JsonUtils.toNumber(object.get("trongTai"));
			this.dienTichSan = JsonUtils.toNumber(object.get("dienTichSan")).floatValue();
			this.loaiXe = JsonUtils.toString(object.get("loaiXe"));
			this.soSuon = JsonUtils.toString(object.get("soSuon"));
			this.soKmDaDi = JsonUtils.toNumber(object.get("soKmDaDi"));				
			return this;
		}
		return null;
	}

	
	public String toJson() {
		Map map = new HashMap();
		map.put("id", id);
		map.put("msModelXe", msModelXe);
		map.put("loaiModel", loaiModel);		
		map.put("nhanHieu",nhanHieu );
		map.put("msThue", msThue);
		map.put("nhienLieu", nhienLieu);		
		map.put("ptac", ptac);
		map.put("trongTai", trongTai);
		map.put("dienTichSan", dienTichSan);
		map.put("loaiXe", loaiXe);
		map.put("soSuon", soSuon);
		map.put("soKmDaDi", soKmDaDi);
		
		return JsonUtils.JsonRpc().encode(map);
	}

}