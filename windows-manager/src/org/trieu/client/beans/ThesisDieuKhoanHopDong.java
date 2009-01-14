package org.trieu.client.beans;
/***********************************************************************
 * Module:  ThesisDieuKhoanHopDong.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisDieuKhoanHopDong
 ***********************************************************************/

import java.util.*;

/** @pdOid 6c24ee1d-e845-48ad-8687-7570c94c4eda */
public class ThesisDieuKhoanHopDong {
   /** @pdOid 76d1b025-cbe1-44a7-b50d-6fa388d82267 */
   public long sttDkhd;
   /** @pdOid 6d77e9d5-b1d5-41c2-b695-17c1361a0be4 */
   public java.lang.String loaiModel;
   /** @pdOid 43c8ab35-88f2-48e9-9f61-53363e3dbffa */
   public long thoiGian;
   /** @pdOid 3db3f973-e401-4894-a484-0023d03acc5e */
   public double kmTran;
   /** @pdOid f8d7fead-da71-4c63-ae2a-0fb6323eceea */
   public long ngayBatDau;
   /** @pdOid 3fcff212-7a4c-4dd6-a1c1-c061204f209f */
   public long ngayKetThuc;
   /** @pdOid 9de9c23d-9187-4f8c-ad1d-0d00e1c31b27 */
   public java.lang.String viTri;
   /** @pdOid db408028-f117-45b8-827d-d40e3aa93729 */
   public java.lang.String dichVu;
   /** @pdOid a56c47e7-aaf0-4125-9a81-dc7437521c2b */
   public java.lang.String baoHiem;
   /** @pdOid e5f7d962-91c3-4ca2-8a92-d7fec36a265c */
   public double chiPhiChoKmThem;
   /** @pdOid 0a82d017-e018-4a37-9ae0-24974381c562 */
   public java.lang.String nhuongQuyenThuongMai;
   
   /** @pdRoleInfo migr=no name=ThesisHopDongThueXe assc=gom mult=0..1 side=A */
   public ThesisHopDongThueXe thesisHopDongThueXe;
   
   
   /** @pdGenerated default parent getter */
   public ThesisHopDongThueXe getThesisHopDongThueXe() {
      return thesisHopDongThueXe;
   }
   
   /** @pdGenerated default parent setter
     * @param newThesisHopDongThueXe */
   public void setThesisHopDongThueXe(ThesisHopDongThueXe newThesisHopDongThueXe) {
      if (this.thesisHopDongThueXe == null || !this.thesisHopDongThueXe.equals(newThesisHopDongThueXe))
      {
         if (this.thesisHopDongThueXe != null)
         {
            ThesisHopDongThueXe oldThesisHopDongThueXe = this.thesisHopDongThueXe;
            this.thesisHopDongThueXe = null;
            oldThesisHopDongThueXe.removeThesisDieuKhoanHopDong(this);
         }
         if (newThesisHopDongThueXe != null)
         {
            this.thesisHopDongThueXe = newThesisHopDongThueXe;
            this.thesisHopDongThueXe.addThesisDieuKhoanHopDong(this);
         }
      }
   }

}