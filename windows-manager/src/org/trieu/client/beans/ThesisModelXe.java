package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisModelXe.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisModelXe
 ***********************************************************************/

import java.util.*;

/** @pdOid 56e0cbc3-ef0c-4eba-a3b1-39039efd700c */
public class ThesisModelXe {
   /** @pdOid 12dee015-efc0-4172-b46f-b2bbe7f8c11d */
   public long id;
   /** @pdOid bf340257-c4a3-4230-ad6e-b3e99a6b454a */
   public java.lang.String msModelXe;
   /** @pdOid c622f0e4-8665-41b7-bc85-cf51db8a92e0 */
   public java.lang.String loaiModel;
   /** @pdOid a80d3268-5a0c-4417-951d-6c0bdd2f868e */
   public java.lang.String nhanHieu;
   /** @pdOid 80196cfd-9d86-403d-a292-89d067378fbe */
   public java.lang.String msThue;
   /** @pdOid 20a941dc-dd54-44e0-9c89-0d732726c24b */
   public java.lang.String nhienLieu;
   /** @pdOid cbec2b9c-b795-4758-9c62-c27edcb6cc6a */
   public double ptac;
   /** @pdOid 3fc6ef8c-f449-4f0d-8fa8-e9f756016497 */
   public double trongTai;
   /** @pdOid 1d590b3b-ae83-4f25-a356-60f6e4d7655b */
   public float dienTichSan;
   /** @pdOid d4d3af6c-d35a-40e6-b045-47a28778157c */
   public java.lang.String loaiXe;
   /** @pdOid 93351a65-0c8c-48a0-ab5d-44c651578cc7 */
   public java.lang.String soSuon;
   /** @pdOid c55c0799-f177-4d6c-8d86-c101ec7eadae */
   public double soKmDaDi;
   
   /** @pdRoleInfo migr=no name=ThesisXe assc=thuocModel coll=java.util.Collection impl=java.util.HashSet mult=0..* */
   public java.util.Collection<ThesisXe> thesisXe;
   
   
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
   
   /** @pdGenerated default setter
     * @param newThesisXe */
   public void setThesisXe(java.util.Collection<ThesisXe> newThesisXe) {
      removeAllThesisXe();
      for (java.util.Iterator iter = newThesisXe.iterator(); iter.hasNext();)
         addThesisXe((ThesisXe)iter.next());
   }
   
   /** @pdGenerated default add
     * @param newThesisXe */
   public void addThesisXe(ThesisXe newThesisXe) {
      if (newThesisXe == null)
         return;
      if (this.thesisXe == null)
         this.thesisXe = new java.util.HashSet<ThesisXe>();
      if (!this.thesisXe.contains(newThesisXe))
      {
         this.thesisXe.add(newThesisXe);
         newThesisXe.setThesisModelXe(this);      
      }
   }
   
   /** @pdGenerated default remove
     * @param oldThesisXe */
   public void removeThesisXe(ThesisXe oldThesisXe) {
      if (oldThesisXe == null)
         return;
      if (this.thesisXe != null)
         if (this.thesisXe.contains(oldThesisXe))
         {
            this.thesisXe.remove(oldThesisXe);
            oldThesisXe.setThesisModelXe((ThesisModelXe)null);
         }
   }
   
   /** @pdGenerated default removeAll */
   public void removeAllThesisXe() {
      if (thesisXe != null)
      {
         ThesisXe oldThesisXe;
         for (java.util.Iterator iter = getIteratorThesisXe(); iter.hasNext();)
         {
            oldThesisXe = (ThesisXe)iter.next();
            iter.remove();
            oldThesisXe.setThesisModelXe((ThesisModelXe)null);
         }
      }
   }

}