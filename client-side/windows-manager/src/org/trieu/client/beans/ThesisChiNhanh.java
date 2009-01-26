package org.trieu.client.model;

/***********************************************************************
 * Module:  ThesisChiNhanh.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisChiNhanh
 ***********************************************************************/

import java.util.*;

/** @pdOid e2dee5cd-c852-49cb-95fc-f9763f309995 */
public class ThesisChiNhanh {
   /** @pdOid 357cce67-4038-4ac2-807c-4917a0b7504b */
   public java.lang.String msChiNhanh;
   /** @pdOid 6339be9a-6247-4c00-9989-328a10fb6db5 */
   public java.lang.String tenChiNhanh;
   
   /** @pdRoleInfo migr=no name=ThesisHopDongThueXe assc=duocQuanLyBoi coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<ThesisHopDongThueXe> thesisHopDongThueXe;
   /** @pdRoleInfo migr=no name=ThesisThuocTinhMoRongCuaChiNhanh assc=co coll=java.util.Collection impl=java.util.HashSet mult=0..* type=Composition */
   public java.util.Collection<ThesisThuocTinhMoRongCuaChiNhanh> thesisThuocTinhMoRongCuaChiNhanh;
   
   
   /** @pdGenerated default getter */
   public java.util.Collection<ThesisHopDongThueXe> getThesisHopDongThueXe() {
      if (thesisHopDongThueXe == null)
         thesisHopDongThueXe = new java.util.HashSet<ThesisHopDongThueXe>();
      return thesisHopDongThueXe;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorThesisHopDongThueXe() {
      if (thesisHopDongThueXe == null)
         thesisHopDongThueXe = new java.util.HashSet<ThesisHopDongThueXe>();
      return thesisHopDongThueXe.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newThesisHopDongThueXe */
   public void setThesisHopDongThueXe(java.util.Collection<ThesisHopDongThueXe> newThesisHopDongThueXe) {
      removeAllThesisHopDongThueXe();
      for (java.util.Iterator iter = newThesisHopDongThueXe.iterator(); iter.hasNext();)
         addThesisHopDongThueXe((ThesisHopDongThueXe)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newThesisHopDongThueXe */
   public void addThesisHopDongThueXe(ThesisHopDongThueXe newThesisHopDongThueXe) {
      if (newThesisHopDongThueXe == null)
         return;
      if (this.thesisHopDongThueXe == null)
         this.thesisHopDongThueXe = new java.util.HashSet<ThesisHopDongThueXe>();
      if (!this.thesisHopDongThueXe.contains(newThesisHopDongThueXe))
      {
         this.thesisHopDongThueXe.add(newThesisHopDongThueXe);
         newThesisHopDongThueXe.setThesisChiNhanh(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldThesisHopDongThueXe */
   public void removeThesisHopDongThueXe(ThesisHopDongThueXe oldThesisHopDongThueXe) {
      if (oldThesisHopDongThueXe == null)
         return;
      if (this.thesisHopDongThueXe != null)
         if (this.thesisHopDongThueXe.contains(oldThesisHopDongThueXe))
         {
            this.thesisHopDongThueXe.remove(oldThesisHopDongThueXe);
            oldThesisHopDongThueXe.setThesisChiNhanh((ThesisChiNhanh)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllThesisHopDongThueXe() {
      if (thesisHopDongThueXe != null)
      {
         ThesisHopDongThueXe oldThesisHopDongThueXe;
         for (java.util.Iterator iter = getIteratorThesisHopDongThueXe(); iter.hasNext();)
         {
            oldThesisHopDongThueXe = (ThesisHopDongThueXe)iter.next();
            iter.remove();
            oldThesisHopDongThueXe.setThesisChiNhanh((ThesisChiNhanh)null);
         }
      }
   }
   /** @pdGenerated default getter */
   public java.util.Collection<ThesisThuocTinhMoRongCuaChiNhanh> getThesisThuocTinhMoRongCuaChiNhanh() {
      if (thesisThuocTinhMoRongCuaChiNhanh == null)
         thesisThuocTinhMoRongCuaChiNhanh = new java.util.HashSet<ThesisThuocTinhMoRongCuaChiNhanh>();
      return thesisThuocTinhMoRongCuaChiNhanh;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorThesisThuocTinhMoRongCuaChiNhanh() {
      if (thesisThuocTinhMoRongCuaChiNhanh == null)
         thesisThuocTinhMoRongCuaChiNhanh = new java.util.HashSet<ThesisThuocTinhMoRongCuaChiNhanh>();
      return thesisThuocTinhMoRongCuaChiNhanh.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newThesisThuocTinhMoRongCuaChiNhanh */
   public void setThesisThuocTinhMoRongCuaChiNhanh(java.util.Collection<ThesisThuocTinhMoRongCuaChiNhanh> newThesisThuocTinhMoRongCuaChiNhanh) {
      removeAllThesisThuocTinhMoRongCuaChiNhanh();
      for (java.util.Iterator iter = newThesisThuocTinhMoRongCuaChiNhanh.iterator(); iter.hasNext();)
         addThesisThuocTinhMoRongCuaChiNhanh((ThesisThuocTinhMoRongCuaChiNhanh)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newThesisThuocTinhMoRongCuaChiNhanh */
   public void addThesisThuocTinhMoRongCuaChiNhanh(ThesisThuocTinhMoRongCuaChiNhanh newThesisThuocTinhMoRongCuaChiNhanh) {
      if (newThesisThuocTinhMoRongCuaChiNhanh == null)
         return;
      if (this.thesisThuocTinhMoRongCuaChiNhanh == null)
         this.thesisThuocTinhMoRongCuaChiNhanh = new java.util.HashSet<ThesisThuocTinhMoRongCuaChiNhanh>();
      if (!this.thesisThuocTinhMoRongCuaChiNhanh.contains(newThesisThuocTinhMoRongCuaChiNhanh))
      {
         this.thesisThuocTinhMoRongCuaChiNhanh.add(newThesisThuocTinhMoRongCuaChiNhanh);
         newThesisThuocTinhMoRongCuaChiNhanh.setThesisChiNhanh(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldThesisThuocTinhMoRongCuaChiNhanh */
   public void removeThesisThuocTinhMoRongCuaChiNhanh(ThesisThuocTinhMoRongCuaChiNhanh oldThesisThuocTinhMoRongCuaChiNhanh) {
      if (oldThesisThuocTinhMoRongCuaChiNhanh == null)
         return;
      if (this.thesisThuocTinhMoRongCuaChiNhanh != null)
         if (this.thesisThuocTinhMoRongCuaChiNhanh.contains(oldThesisThuocTinhMoRongCuaChiNhanh))
         {
            this.thesisThuocTinhMoRongCuaChiNhanh.remove(oldThesisThuocTinhMoRongCuaChiNhanh);
            oldThesisThuocTinhMoRongCuaChiNhanh.setThesisChiNhanh((ThesisChiNhanh)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllThesisThuocTinhMoRongCuaChiNhanh() {
      if (thesisThuocTinhMoRongCuaChiNhanh != null)
      {
         ThesisThuocTinhMoRongCuaChiNhanh oldThesisThuocTinhMoRongCuaChiNhanh;
         for (java.util.Iterator iter = getIteratorThesisThuocTinhMoRongCuaChiNhanh(); iter.hasNext();)
         {
            oldThesisThuocTinhMoRongCuaChiNhanh = (ThesisThuocTinhMoRongCuaChiNhanh)iter.next();
            iter.remove();
            oldThesisThuocTinhMoRongCuaChiNhanh.setThesisChiNhanh((ThesisChiNhanh)null);
         }
      }
   }

}