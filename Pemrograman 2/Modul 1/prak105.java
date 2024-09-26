import java.util.Scanner;

public class prak105 {
    public static final double PI = 3.14;
    public static void main(String[] args) {
      Scanner input = new Scanner (System.in);
      System.out.print("Masukkan Jari-Jari: ");
      float jari = input.nextFloat();
      System.out.print("Masukkan Tinggi: ");
      float tinggi = input.nextFloat();
      
      double volume = PI * Math.pow(jari, 2) * tinggi;
      
      System.out.print("Volume Tabung Dengan Jari-jari " +jari+ " cm dan tinggi " + tinggi + " cm adalah " + String.format("%.3f", volume) + " m3");
    input.close();
  }
}