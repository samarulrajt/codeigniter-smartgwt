package org.trieu.client.model;

/***********************************************************************
 * Module:  ThesisThuocTinhMoRongCuaXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisThuocTinhMoRongCuaXe
 ***********************************************************************/

import java.util.*;

/** @pdOid e3f7d796-a1d0-44dd-befd-792c6224d77f */
public class ThesisThuocTinhMoRongCuaXe {
   /** @pdOid cc897693-ce7c-40e4-8411-02640564f0d6 */
   public java.lang.String ten;
   /** @pdOid fc00a194-5480-4dc2-a424-7719fca772bc */
   public java.lang.String giaTri;
   
   /** @pdRoleInfo migr=no name=ThesisXe assc=xeCoThuocTinh mult=0..1 side=A */
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
            oldThesisXe.removeThesisThuocTinhMoRongCuaXe(this);
         }
         if (newThesisXe != null)
         {
            this.thesisXe = newThesisXe;
            this.thesisXe.addThesisThuocTinhMoRongCuaXe(this);
         }
      }
   }

}