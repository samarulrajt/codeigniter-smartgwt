package org.trieu.client.beans;
/***********************************************************************
 * Module:  ThesisThietBi.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisThietBi
 ***********************************************************************/


/** @pdOid cc73811c-1f84-4884-87de-073cb935ec02 */
public class ThesisThietBi implements rocket.json.client.JsonSerializable{
   /** @pdOid 616b31a9-5213-4c96-8703-ca4711849f66 */
   private long id;
   /** @pdOid cde1372f-a660-4d47-a6e8-c76d830e8022 */
   private java.lang.String msThietBi;
   /** @pdOid e8e05e71-481d-446c-85bf-35b09c71d115 */
   private java.lang.String tenThietBi;
   /** @pdOid 487c2775-f958-4dcb-8672-79121f164f5a */
   private java.lang.String loaiThietBi;
   

   /** @pdRoleInfo migr=no name=ThesisXe assc=coThietBi mult=0..1 side=A */
   public ThesisXe thesisXe;
   
   /** @pdOid 9ccc2f48-add5-41e1-8f73-9ccdecf518b8 */
   public java.lang.String getLoaiThietBi() {
      return loaiThietBi;
   }
   
   /** @param newLoaiThietBi
    * @pdOid 40599435-f6d3-4cae-ab08-de2310be9347 */
   public void setLoaiThietBi(java.lang.String newLoaiThietBi) {
      loaiThietBi = newLoaiThietBi;
   }
   
   /** @pdOid c17e4c0f-a6e6-4682-8ec8-c63973c5e27f */
   public java.lang.String getMsThietBi() {
      return msThietBi;
   }
   
   /** @param newMsThietBi
    * @pdOid 2d3e8214-d11f-4738-981f-2f6054ab771e */
   public void setMsThietBi(java.lang.String newMsThietBi) {
      msThietBi = newMsThietBi;
   }
   
   /** @pdOid 1c7824fa-d584-4237-ba2b-adb6a8432c89 */
   public java.lang.String getTenThietBi() {
      return tenThietBi;
   }
   
   /** @param newTenThietBi
    * @pdOid e9e8882e-1b4c-48b3-a2fc-faea282c9c35 */
   public void setTenThietBi(java.lang.String newTenThietBi) {
      tenThietBi = newTenThietBi;
   }
   
   /** @pdOid 1b93b5b2-7a8f-4aff-8132-efb83cfd71d8 */
   public long getId() {
      return id;
   }
   
   /** @param newId
    * @pdOid d5e4061b-b803-4cc4-a657-f47a07cafd8a */
   public void setId(long newId) {
      id = newId;
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
            oldThesisXe.removeThesisThietBi(this);
         }
         if (newThesisXe != null)
         {
            this.thesisXe = newThesisXe;
            this.thesisXe.addThesisThietBi(this);
         }
      }
   }

}