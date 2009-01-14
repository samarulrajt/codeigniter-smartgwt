package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisLichSuCapNhatXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisLichSuCapNhatXe
 ***********************************************************************/

import java.util.*;

/** Ngày tạo cập nhật sẽ bằng ngày cập nhật thông tin mới cho Xe
 * 
 * @pdOid b5c04554-29a4-49d0-b380-dc9b0f03ed38 */
public class ThesisLichSuCapNhatXe {
   /** @pdOid b75ddaee-81b4-4866-afb2-57f76e13cc34 */
   public long sttCapNhat;
   /** @pdOid 2c66a03f-9bf6-45ef-8ebc-a938dccb36ba */
   public long ngayCapNhat;
   /** @pdOid f0d7dee3-6ac8-4cb5-892c-af3932c92eb4 */
   public java.lang.String ten;
   /** @pdOid 53222601-3847-44ba-a144-24f2732bb968 */
   public java.lang.String giaTri;
   /** @pdOid 351abc21-e31d-4634-a322-9619f5348a72 */
   public java.lang.String kieuDuLieu;
   
   /** @pdRoleInfo migr=no name=ThesisXe assc=coCapNhat mult=0..1 side=A */
   public ThesisXe thesisXe;
   
   
   /** @pdGenerated default parent getter */
   public ThesisXe getThesisXe() {
      return thesisXe;
   }
   
   /** @pdGenerated default parent setter
     * @param newThesisXe */
   public void setThesisXe(ThesisXe newThesisXe) {
      if (this.thesisXe == null || !this.thesisXe.equals(newThesisXe))
      {
         if (this.thesisXe != null)
         {
            ThesisXe oldThesisXe = this.thesisXe;
            this.thesisXe = null;
            oldThesisXe.removeThesisLichSuCapNhatXe(this);
         }
         if (newThesisXe != null)
         {
            this.thesisXe = newThesisXe;
            this.thesisXe.addThesisLichSuCapNhatXe(this);
         }
      }
   }

}