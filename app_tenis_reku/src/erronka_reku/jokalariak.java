package erronka_reku;

import java.util.ArrayList;
import java.util.Date;

public class jokalariak {
    private ArrayList<jokalaria> jokalariak;

    public jokalariak() {
        jokalariak = new ArrayList<>();
    }

    /**
     * Jokalariaren informazioa gehitezko funtzioa
     * @param nan
     * @param izena
     * @param abizena
     * @param jaiotzeData
     * @param herrialdea
     * @param tituluak
     * @param erabiltzailea
     * @param pasahitza
     */
    public void gehituJokalaria(String nan, String izena, String abizena, Date jaiotzeData, String herrialdea, int tituluak, String erabiltzailea, String pasahitza) {
        jokalaria jokalaria = new jokalaria(nan, izena, abizena, jaiotzeData, herrialdea, tituluak, erabiltzailea, pasahitza);
        jokalariak.add(jokalaria);
    }

	/**
	 * jokalarien lista itzultzen du
	 * @return jokalarien lista
	 */
    public ArrayList<jokalaria> getJokalariak() {
        return jokalariak;
    }
}
