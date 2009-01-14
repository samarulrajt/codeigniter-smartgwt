package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisHopDongThueXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisHopDongThueXe
 ***********************************************************************/

import java.util.*;

/** @pdOid 715a354f-aba4-484e-bf33-5c8d5a63fc0f */
public class ThesisHopDongThueXe {
   /** @pdOid d521e66c-9513-4ba1-9e21-e577645d152c */
   public java.lang.String msHopDong;
   /** @pdOid 39c79176-121c-4738-98bc-b0113705f445 */
   public java.lang.String chiNhanhQuanLyXe;
   /** @pdOid 982d77ca-b5b7-468d-be84-59168a81afe7 */
   public java.lang.String coQuanChoThueXe;
   /** @pdOid 962c7b8c-31b5-4f1a-8cb1-b03e5eb6844d */
   public java.lang.String hopDong;
   /** @pdOid 99c9373f-8d2d-4419-8b4a-20c6b026e16a */
   public java.lang.String loaiHopDong;
   /** @pdOid 74efdc88-1777-40af-8db8-950f3b8e96ce */
   public java.lang.String nguoiTiepNhan;
   /** @pdOid 03512894-bbb7-449d-8c4e-491a9985d4cf */
   public double soTien;
   /** @pdOid 9d3b901b-cf4e-493f-bd36-46cd24d6dc9f */
   public double soTienThucTePhaiTra;
   /** @pdOid 668b3bad-8bdf-4111-8b16-dfc814d04b33 */
   public java.lang.String msTheXang;
   /** @pdOid 094d81ee-20b3-4d25-bee0-60b519aa2888 */
   public java.lang.String msPin;
   /** @pdOid 56e39aab-1f80-4c75-8414-1675a0fdaf0d */
   public java.lang.String msTaiXe;
   
   /** @pdRoleInfo migr=no name=ThesisThuocTinhMoRong assc=coThuocTinh coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<ThesisThuocTinhMoRong> thesisThuocTinhMoRong;
   /** @pdRoleInfo migr=no name=ThesisDieuKhoanHopDong assc=gom coll=java.util.Collection impl=java.util.HashSet mult=1..* */
   public java.util.Collection<ThesisDieuKhoanHopDong> thesisDieuKhoanHopDong;
   /** @pdRoleInfo migr=no name=ThesisXe assc=quanLy mult=1..1 side=A */
   public ThesisXe thesisXe;
   /** @pdRoleInfo migr=no name=ThesisChiNhanh assc=duocQuanLyBoi mult=0..1 side=A */
   public ThesisChiNhanh thesisChiNhanh;
   
   
   /** @pdGenerated default getter */
   public java.util.Collection<ThesisThuocTinhMoRong> getThesisThuocTinhMoRong() {
      if (thesisThuocTinhMoRong == null)
         thesisThuocTinhMoRong = new java.util.HashSet<ThesisThuocTinhMoRong>();
      return thesisThuocTinhMoRong;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorThesisThuocTinhMoRong() {
      if (thesisThuocTinhMoRong == null)
         thesisThuocTinhMoRong = new java.util.HashSet<ThesisThuocTinhMoRong>();
      return thesisThuocTinhMoRong.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newThesisThuocTinhMoRong */
   public void setThesisThuocTinhMoRong(java.util.Collection<ThesisThuocTinhMoRong> newThesisThuocTinhMoRong) {
      removeAllThesisThuocTinhMoRong();
      for (java.util.Iterator iter = newThesisThuocTinhMoRong.iterator(); iter.hasNext();)
         addThesisThuocTinhMoRong((ThesisThuocTinhMoRong)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newThesisThuocTinhMoRong */
   public void addThesisThuocTinhMoRong(ThesisThuocTinhMoRong newThesisThuocTinhMoRong) {
      if (newThesisThuocTinhMoRong == null)
         return;
      if (this.thesisThuocTinhMoRong == null)
         this.thesisThuocTinhMoRong = new java.util.HashSet<ThesisThuocTinhMoRong>();
      if (!this.thesisThuocTinhMoRong.contains(newThesisThuocTinhMoRong))
      {
         this.thesisThuocTinhMoRong.add(newThesisThuocTinhMoRong);
         newThesisThuocTinhMoRong.setThesisHopDongThueXe(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldThesisThuocTinhMoRong */
   public void removeThesisThuocTinhMoRong(ThesisThuocTinhMoRong oldThesisThuocTinhMoRong) {
      if (oldThesisThuocTinhMoRong == null)
         return;
      if (this.thesisThuocTinhMoRong != null)
         if (this.thesisThuocTinhMoRong.contains(oldThesisThuocTinhMoRong))
         {
            this.thesisThuocTinhMoRong.remove(oldThesisThuocTinhMoRong);
            oldThesisThuocTinhMoRong.setThesisHopDongThueXe((ThesisHopDongThueXe)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllThesisThuocTinhMoRong() {
      if (thesisThuocTinhMoRong != null)
      {
         ThesisThuocTinhMoRong oldThesisThuocTinhMoRong;
         for (java.util.Iterator iter = getIteratorThesisThuocTinhMoRong(); iter.hasNext();)
         {
            oldThesisThuocTinhMoRong = (ThesisThuocTinhMoRong)iter.next();
            iter.remove();
            oldThesisThuocTinhMoRong.setThesisHopDongThueXe((ThesisHopDongThueXe)null);
         }
      }
   }
   /** @pdGenerated default getter */
   public java.util.Collection<ThesisDieuKhoanHopDong> getThesisDieuKhoanHopDong() {
      if (thesisDieuKhoanHopDong == null)
         thesisDieuKhoanHopDong = new java.util.HashSet<ThesisDieuKhoanHopDong>();
      return thesisDieuKhoanHopDong;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorThesisDieuKhoanHopDong() {
      if (thesisDieuKhoanHopDong == null)
         thesisDieuKhoanHopDong = new java.util.HashSet<ThesisDieuKhoanHopDong>();
      return thesisDieuKhoanHopDong.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newThesisDieuKhoanHopDong */
   public void setThesisDieuKhoanHopDong(java.util.Collection<ThesisDieuKhoanHopDong> newThesisDieuKhoanHopDong) {
      removeAllThesisDieuKhoanHopDong();
      for (java.util.Iterator iter = newThesisDieuKhoanHopDong.iterator(); iter.hasNext();)
         addThesisDieuKhoanHopDong((ThesisDieuKhoanHopDong)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newThesisDieuKhoanHopDong */
   public void addThesisDieuKhoanHopDong(ThesisDieuKhoanHopDong newThesisDieuKhoanHopDong) {
      if (newThesisDieuKhoanHopDong == null)
         return;
      if (this.thesisDieuKhoanHopDong == null)
         this.thesisDieuKhoanHopDong = new java.util.HashSet<ThesisDieuKhoanHopDong>();
      if (!this.thesisDieuKhoanHopDong.contains(newThesisDieuKhoanHopDong))
      {
         this.thesisDieuKhoanHopDong.add(newThesisDieuKhoanHopDong);
         newThesisDieuKhoanHopDong.setThesisHopDongThueXe(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldThesisDieuKhoanHopDong */
   public void removeThesisDieuKhoanHopDong(ThesisDieuKhoanHopDong oldThesisDieuKhoanHopDong) {
      if (oldThesisDieuKhoanHopDong == null)
         return;
      if (this.thesisDieuKhoanHopDong != null)
         if (this.thesisDieuKhoanHopDong.contains(oldThesisDieuKhoanHopDong))
         {
            this.thesisDieuKhoanHopDong.remove(oldThesisDieuKhoanHopDong);
            oldThesisDieuKhoanHopDong.setThesisHopDongThueXe((ThesisHopDongThueXe)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllThesisDieuKhoanHopDong() {
      if (thesisDieuKhoanHopDong != null)
      {
         ThesisDieuKhoanHopDong oldThesisDieuKhoanHopDong;
         for (java.util.Iterator iter = getIteratorThesisDieuKhoanHopDong(); iter.hasNext();)
         {
            oldThesisDieuKhoanHopDong = (ThesisDieuKhoanHopDong)iter.next();
            iter.remove();
            oldThesisDieuKhoanHopDong.setThesisHopDongThueXe((ThesisHopDongThueXe)null);
         }
      }
   }
   /** @pdGenerated default parent getter */
   public ThesisChiNhanh getThesisChiNhanh() {
      return thesisChiNhanh;
   }
   
   /** @pdGenerated default parent setter
     * @param newThesisChiNhanh */
   public void setThesisChiNhanh(ThesisChiNhanh newThesisChiNhanh) {
      if (this.thesisChiNhanh == null || !this.thesisChiNhanh.equals(newThesisChiNhanh))
      {
         if (this.thesisChiNhanh != null)
         {
            ThesisChiNhanh oldThesisChiNhanh = this.thesisChiNhanh;
            this.thesisChiNhanh = null;
            oldThesisChiNhanh.removeThesisHopDongThueXe(this);
         }
         if (newThesisChiNhanh != null)
         {
            this.thesisChiNhanh = newThesisChiNhanh;
            this.thesisChiNhanh.addThesisHopDongThueXe(this);
         }
      }
   }

}