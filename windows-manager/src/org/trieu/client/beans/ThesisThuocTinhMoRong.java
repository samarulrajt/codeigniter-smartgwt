package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisThuocTinhMoRong.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisThuocTinhMoRong
 ***********************************************************************/

import java.util.*;

/** @pdOid 6bd532db-4bf9-42b3-82d2-68f4444e5e78 */
public class ThesisThuocTinhMoRong {
   /** @pdOid 659711d4-067b-41bd-be02-bd167d323301 */
   public java.lang.String msHopDong;
   /** @pdOid cab7329f-f74e-4545-b55b-15f964a54ba7 */
   public java.lang.String ten;
   /** @pdOid 08cc8575-7da2-41e1-8737-d676c6b42b3c */
   public java.lang.String giaTri;
   
   /** @pdRoleInfo migr=no name=ThesisHopDongThueXe assc=coThuocTinh mult=0..1 side=A */
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
            oldThesisHopDongThueXe.removeThesisThuocTinhMoRong(this);
         }
         if (newThesisHopDongThueXe != null)
         {
            this.thesisHopDongThueXe = newThesisHopDongThueXe;
            this.thesisHopDongThueXe.addThesisThuocTinhMoRong(this);
         }
      }
   }

}