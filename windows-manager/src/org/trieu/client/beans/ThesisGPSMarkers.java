package org.trieu.client.beans;

/***********************************************************************
 * Module:  ThesisGPSMarkers.java
 * Author:  Trieu
 * Purpose: Defines the Class ThesisGPSMarkers
 ***********************************************************************/

import java.util.*;

/** @pdOid 33dab1e4-250c-4648-b725-c86a7ce32603 */
public class ThesisGPSMarkers {
   /** @pdOid 4e0b6bb6-dca9-4197-ac7d-4bb47c9b20e4 */
   public long id;
   /** @pdOid d5095473-8c4b-4d7f-af57-fdee35bb0c0b */
   public float lat;
   /** @pdOid fc86b33e-654f-4d75-8adf-da306e4cbf68 */
   public float lng;
   /** @pdOid 362bb834-efed-427c-825b-355fff03a093 */
   public java.lang.String type;
   /** @pdOid 5921b7f9-bed9-41b3-8d29-5d7af7e330d3 */
   public long gpsTime;
   
   /** @pdRoleInfo migr=no name=ThesisNhatKiHanhTrinh assc=ghiNhanTaiViTri mult=0..1 side=A */
   public ThesisNhatKiHanhTrinh thesisNhatKiHanhTrinh;
   
   
   /** @pdGenerated default parent getter */
   public ThesisNhatKiHanhTrinh getThesisNhatKiHanhTrinh() {
      return thesisNhatKiHanhTrinh;
   }
   
   /** @pdGenerated default parent setter
     * @param newThesisNhatKiHanhTrinh */
   public void setThesisNhatKiHanhTrinh(ThesisNhatKiHanhTrinh newThesisNhatKiHanhTrinh) {
      if (this.thesisNhatKiHanhTrinh == null || !this.thesisNhatKiHanhTrinh.equals(newThesisNhatKiHanhTrinh))
      {
         if (this.thesisNhatKiHanhTrinh != null)
         {
            ThesisNhatKiHanhTrinh oldThesisNhatKiHanhTrinh = this.thesisNhatKiHanhTrinh;
            this.thesisNhatKiHanhTrinh = null;
            oldThesisNhatKiHanhTrinh.removeThesisGPSMarkers(this);
         }
         if (newThesisNhatKiHanhTrinh != null)
         {
            this.thesisNhatKiHanhTrinh = newThesisNhatKiHanhTrinh;
            this.thesisNhatKiHanhTrinh.addThesisGPSMarkers(this);
         }
      }
   }

}