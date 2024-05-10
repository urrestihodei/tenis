package erronka_reku;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;

public class jokalariakKudeatu {
    private JFrame frame;
    private JPanel panel;
    private jokalariak jokalariakManager; 

    public jokalariakKudeatu() {
        frame = new JFrame("Jokalaria Kudeatu");
        frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        frame.setSize(400, 150);

        panel = new JPanel();
        frame.add(panel);
        panel.setLayout(new FlowLayout(FlowLayout.CENTER, 20, 20));

        jokalariakManager = new jokalariak(); 

        JButton btnGehitu = new JButton("Jokalariak Gehitu");
        panel.add(btnGehitu);

        JButton btnErakutsi = new JButton("Jokalariak Erakutsi");
        panel.add(btnErakutsi);

        JButton btnSortu = new JButton("Fitxategia Sortu");
        panel.add(btnSortu);

        JButton btnAmaitu = new JButton("Amaitu");
        panel.add(btnAmaitu);

        btnGehitu.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                gehituJokalariaGUI();
            }
        });

        btnErakutsi.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                JokalariakGUI();
            }
        });

        btnSortu.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                fitxategiaSortu();
            }
        });

        btnAmaitu.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                frame.dispose();
            }
        });

        frame.setVisible(true);
    }
    
    /**
	 * Funtzio honek sql fitxategiak sortu eta gorde egiten ditu jokalariaren informazioarekin
	 */
    private void fitxategiaSortu() {
        JFileChooser fileChooser = new JFileChooser();
        fileChooser.setDialogTitle("Aukeratu fitxategiaren kokapena");
        fileChooser.setFileSelectionMode(JFileChooser.FILES_ONLY);

        int aukera = fileChooser.showSaveDialog(frame);

        if (aukera == JFileChooser.APPROVE_OPTION) {
            try {
                BufferedWriter writer = new BufferedWriter(new FileWriter(fileChooser.getSelectedFile()));
                SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd");

                for (jokalaria jokalaria : jokalariakManager.getJokalariak()) {
                    String data = dateFormat.format(jokalaria.getJaiotze_data());
                    String sql = "INSERT INTO `jokalaria` (`nan`, `izena`, `abizena`, `herria`, `jaiotze_data`, `tituluak`, `erabiltzailea`, `pasahitza`, `aktibo` ) VALUES ('"
                            + jokalaria.getNan() + "', '" + jokalaria.getIzena() + "', '" + jokalaria.getAbizena() + "', '"
                            + jokalaria.getHerrialdea() + "', '" + data + "', '" + jokalaria.getTituluak() + "', '"
                            + jokalaria.getErabiltzailea() + "', '" + jokalaria.getPasahitza() + "', 1);\n";
                    writer.write(sql);
                }

                writer.close();
                JOptionPane.showMessageDialog(null, "Fitxategia ondo idatzi da.");
            } catch (IOException e) {
                JOptionPane.showMessageDialog(null, "Errorea fitxategia idazteko garaian: " + e.getMessage());
            }
        } else {
            JOptionPane.showMessageDialog(null, "Ez duzu fitxategi bat aukeratu.");
        }
    }

    /**
     * jokalariak gehitzeko ingurune grafikoa egiten du.
     */
    public void gehituJokalariaGUI() {
        JPanel panel = new JPanel();
        panel.setLayout(new GridLayout(8, 2));

        JTextField nanField = new JTextField(10);
        JTextField izenaField = new JTextField(10);
        JTextField abizenaField = new JTextField(10);
        JTextField jaiotzeDataField = new JTextField(10);
        JTextField herrialdeaField = new JTextField(10);
        JTextField tituluakField = new JTextField(10);
        JTextField erabiltzaileaField = new JTextField(10);
        JTextField pasahitzaField = new JTextField(10);

        panel.add(new JLabel("NAN (00000000X):"));
        panel.add(nanField);
        panel.add(new JLabel("Izena:"));
        panel.add(izenaField);
        panel.add(new JLabel("Abizena:"));
        panel.add(abizenaField);
        panel.add(new JLabel("Jaiotze Data (YYYY/MM/DD):"));
        panel.add(jaiotzeDataField);
        panel.add(new JLabel("Herrialdea:"));
        panel.add(herrialdeaField);
        panel.add(new JLabel("Tituluak:"));
        panel.add(tituluakField);
        panel.add(new JLabel("Erabiltzailea:"));
        panel.add(erabiltzaileaField);
        panel.add(new JLabel("Pasahitza:"));
        panel.add(pasahitzaField);

        int result = JOptionPane.showConfirmDialog(null, panel, "Jokalarien informazioa sartu",
                JOptionPane.OK_CANCEL_OPTION);
        if (result == JOptionPane.OK_OPTION) {
            String nan = nanField.getText().toUpperCase();
            String izena = izenaField.getText();
            String abizena = abizenaField.getText();
            String herrialdea = herrialdeaField.getText();
            Date jaiotzeData = null;
            String tituluakStr = tituluakField.getText();
            String erabiltzailea = erabiltzaileaField.getText();
            String pasahitza = pasahitzaField.getText();

            String jaiotzeDataInput = jaiotzeDataField.getText();
            try {
                jaiotzeData = new SimpleDateFormat("yyyy/MM/dd").parse(jaiotzeDataInput);
                int tituluak1 = Integer.parseInt(tituluakStr);
                jokalariakManager.gehituJokalaria(nan, izena, abizena, jaiotzeData, herrialdea, tituluak1, erabiltzailea, pasahitza);
            } catch (ParseException e) {
                JOptionPane.showMessageDialog(null, "Errorea datuak irakurtzean: " + e.getMessage());
            }
        }

    }

    /**
     * jokalriak erakusteko ingurune grafikoa egiten du.
     */
    public void JokalariakGUI() {
        ArrayList<jokalaria> jokalariaLista = jokalariakManager.getJokalariak();

        if (!jokalariaLista.isEmpty()) {
            frame = new JFrame("Jokalariak");
            frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
            frame.setSize(400, 300);

            JPanel panel = new JPanel(new GridLayout(jokalariaLista.size(), 1));

            SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd");

            for (jokalaria jokalaria : jokalariaLista) {
                JTextArea textArea = new JTextArea();
                textArea.append("Nan: " + jokalaria.getNan() + "\n");
                textArea.append("Izena: " + jokalaria.getIzena() + "\n");
                textArea.append("Abizena: " + jokalaria.getAbizena() + "\n");
                textArea.append("Jaiotze data: " + dateFormat.format(jokalaria.getJaiotze_data()) + "\n");
                textArea.append("Herrialdea: " + jokalaria.getHerrialdea() + "\n");
                textArea.append("Tituluak: " + jokalaria.getTituluak() + "\n");
                textArea.append("Erabiltzailea: " + jokalaria.getErabiltzailea() + "\n");
                textArea.append("Pasahitza: " + jokalaria.getPasahitza() + "\n");

                panel.add(textArea);
            }

            JScrollPane scrollPane = new JScrollPane(panel);
            frame.add(scrollPane);

            frame.setVisible(true);
        } else {
            JOptionPane.showMessageDialog(null, "Lista hutsa dago.");
        }
    }


    public static void main(String[] args) {
        new jokalariakKudeatu();
    }
}
