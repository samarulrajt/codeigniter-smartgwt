package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisNhatKiHanhTrinh.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisNhatKiHanhTrinh
 ***********************************************************************/

import java.util.*;

/** @pdOid 82baee83-81f9-40fb-adad-58ef852da052 */
public class ThesisNhatKiHanhTrinh {
   /** @pdOid a769d7fd-ddbb-4440-9d56-7b951d787c23 */
   public long id;
   /** @pdOid fea32950-0941-4949-a267-d8afa56da1de */
   public java.lang.String ten;
   /** @pdOid def59df6-c015-4599-9506-40079fe49105 */
   public java.lang.String diaDiem;
   /** @pdOid 2671eb1f-15cb-4a2f-941c-3c731d485500 */
   public float latitude;
   /** @pdOid dd528e2e-7d0e-4a3a-b28b-8995b49ae1af */
   public float longitude;
   /** @pdOid 5f6ccaa5-4e63-43ad-baf0-1d5fe733a869 */
   public long ngayKhoiHanh;
   /** @pdOid 9628d931-6d2b-4e6f-8dd2-6f60d61f8f96 */
   public long ngayKetThuc;
   
   /** @pdRoleInfo migr=no name=ThesisGPSMarkers assc=ghiNhanTaiViTri coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<ThesisGPSMarkers> thesisGPSMarkers;
   /** @pdRoleInfo migr=no name=ThesisXe assc=coHanhTrinh mult=1..1 side=A */
   public ThesisXe thesisXe;
   
   
   /** @pdGenerated default getter */
   public java.util.Collection<ThesisGPSMarkers> getThesisGPSMarkers() {
      if (thesisGPSMarkers == null)
         thesisGPSMarkers = new java.util.HashSet<ThesisGPSMarkers>();
      return thesisGPSMarkers;
   }
   
   /** @pdGenerated default iterator getter */
   public java.util.Iterator getIteratorThesisGPSMarkers() {
      if (thesisGPSMarkers == null)
         thesisGPSMarkers = new java.util.HashSet<ThesisGPSMarkers>();
      return thesisGPSMarkers.iterator();
   }
   
   /** @pdGenerated default setter
     * @param newThesisGPSMarkers */
   public void setThesisGPSMarkers(java.util.Collection<ThesisGPSMarkers> newThesisGPSMarkers) {
      removeAllThesisGPSMarkers();
      for (java.util.Iterator iter = newThesisGPSMarkers.iterator(); iter.hasNext();)
         addThesisGPSMarkers((ThesisGPSMarkers)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newThesisGPSMarkers */
   public void addThesisGPSMarkers(ThesisGPSMarkers newThesisGPSMarkers) {
      if (newThesisGPSMarkers == null)
         return;
      if (this.thesisGPSMarkers == null)
         this.thesisGPSMarkers = new java.util.HashSet<ThesisGPSMarkers>();
      if (!this.thesisGPSMarkers.contains(newThesisGPSMarkers))
      {
         this.thesisGPSMarkers.add(newThesisGPSMarkers);
         newThesisGPSMarkers.setThesisNhatKiHanhTrinh(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldThesisGPSMarkers */
   public void removeThesisGPSMarkers(ThesisGPSMarkers oldThesisGPSMarkers) {
      if (oldThesisGPSMarkers == null)
         return;
      if (this.thesisGPSMarkers != null)
         if (this.thesisGPSMarkers.contains(oldThesisGPSMarkers))
         {
            this.thesisGPSMarkers.remove(oldThesisGPSMarkers);
            oldThesisGPSMarkers.setThesisNhatKiHanhTrinh((ThesisNhatKiHanhTrinh)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllThesisGPSMarkers() {
      if (thesisGPSMarkers != null)
      {
         ThesisGPSMarkers oldThesisGPSMarkers;
         for (java.util.Iterator iter = getIteratorThesisGPSMarkers(); iter.hasNext();)
         {
            oldThesisGPSMarkers = (ThesisGPSMarkers)iter.next();
            iter.remove();
            oldThesisGPSMarkers.setThesisNhatKiHanhTrinh((ThesisNhatKiHanhTrinh)null);
         }
      }
   }
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
            oldThesisXe.removeThesisNhatKiHanhTrinh(this);
         }
         if (newThesisXe != null)
         {
            this.thesisXe = newThesisXe;
            this.thesisXe.addThesisNhatKiHanhTrinh(this);
         }
      }
   }

}