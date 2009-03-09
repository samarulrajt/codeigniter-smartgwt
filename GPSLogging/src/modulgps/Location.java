package modulgps;

public class Location {

    // NMEA Elements
    String utc;
    String latitude;
    String northHemi;
    String longitude;
    String eastHemi;
    String altitude;
    int quality;
    int nSat;
    String horDilution;
    String altitudeUnit;
    String geoidalHeight;
    String geoidalHeightUnit;
    String diffCorrection;
    String diffStationId;
    public static String raw_msg = "123519,1045.2059,N,10637.7378,E,52-KA3775";

    /**
     * Method that parses a NMEA string and returns Location. For more info check
     * this page: http://www.gpsinformation.org/dale/nmea.htm#GGA
     *
     * @param value -
     *          string that represent NMEA GGA string
     */
    public void parseGPGGA(String value) {
        // Helper class to parse strings
        StringTokenizer tok = new StringTokenizer(value, ",");

        utc = tok.nextToken();
        latitude = tok.nextToken();
        northHemi = tok.nextToken();
        longitude = tok.nextToken();
        eastHemi = tok.nextToken();
        quality = Integer.parseInt(tok.nextToken());
        nSat = Integer.parseInt(tok.nextToken());
        horDilution = tok.nextToken();
        altitude = tok.nextToken();
        altitudeUnit = tok.nextToken();
        geoidalHeight = tok.nextToken();
        geoidalHeightUnit = tok.nextToken();
        diffCorrection = tok.nextToken();
        diffStationId = tok.nextToken();
    }

    public void setRawMsg(String s) {
        StringTokenizer tok = new StringTokenizer(s, ",");
        utc = tok.nextToken();
        latitude = tok.nextToken();
        northHemi = tok.nextToken();
        longitude = tok.nextToken();
        eastHemi = tok.nextToken();

        StringBuffer buffer = new StringBuffer();
        buffer.append(utc);
        buffer.append(",");
        buffer.append(latitude);
        buffer.append(",");
        buffer.append(northHemi);
        buffer.append(",");
        buffer.append(longitude);
        buffer.append(",");
        buffer.append(eastHemi);
        buffer.append(",");
        buffer.append("52-KA3775");

        raw_msg = buffer.toString();
    }

    
}
