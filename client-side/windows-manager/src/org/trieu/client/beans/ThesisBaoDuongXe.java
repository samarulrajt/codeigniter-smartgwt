package org.trieu.client.model;

/***********************************************************************
 * Module:  ThesisBaoDuongXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisBaoDuongXe
 ***********************************************************************/

import java.util.*;

/** @pdOid fdd0a363-4634-4766-83d4-23d32cb51519 */
public class ThesisBaoDuongXe {
   /** @pdOid 396be42f-e099-4b11-944f-3ed66400bc82 */
   public java.lang.String khoangMucBaoDuong;
   /** @pdOid cca9a2c0-3aac-4b45-ac72-41eb4924426e */
   public java.lang.String thoiGian;
   /** @pdOid c41ac2c3-f497-4601-96eb-a7010fe61d7e */
   public int speedometer;
   
   /** @pdRoleInfo migr=no name=ThesisXe assc=baoDuongXe mult=0..1 side=A */
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
            oldThesisXe.removeThesisBaoDuongXe(this);
         }
         if (newThesisXe != null)
         {
            this.thesisXe = newThesisXe;
            this.thesisXe.addThesisBaoDuongXe(this);
         }
      }
   }

}