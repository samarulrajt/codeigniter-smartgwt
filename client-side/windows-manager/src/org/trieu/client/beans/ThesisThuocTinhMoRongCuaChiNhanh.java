package org.trieu.client.model;

/***********************************************************************
 * Module:  ThesisThuocTinhMoRongCuaChiNhanh.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisThuocTinhMoRongCuaChiNhanh
 ***********************************************************************/

import java.util.*;

/** @pdOid 9c79da2b-e7d0-4179-a93d-cb54ad95fb3b */
public class ThesisThuocTinhMoRongCuaChiNhanh {
   /** @pdOid 8a9ad4a7-89ad-4735-b33b-7b67d0bb0cbf */
   public java.lang.String ten;
   /** @pdOid 5caa16fc-391d-40b3-8544-c752c6e1eadf */
   public java.lang.String giaTri;
   
   /** @pdRoleInfo migr=no name=ThesisChiNhanh assc=co mult=1..1 side=A */
   public ThesisChiNhanh thesisChiNhanh;
   
   
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
            oldThesisChiNhanh.removeThesisThuocTinhMoRongCuaChiNhanh(this);
         }
         if (newThesisChiNhanh != null)
         {
            this.thesisChiNhanh = newThesisChiNhanh;
            this.thesisChiNhanh.addThesisThuocTinhMoRongCuaChiNhanh(this);
         }
      }
   }

}