package application;

import javafx.application.Application;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.Scene;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.scene.layout.VBox;
import javafx.stage.Stage;

public class Main extends Application {
    public static void main(String[] args) {
        launch(args);
    }

    @Override
    public void start(Stage stage) {
        // Data Mahasiswa
        ObservableList<Mahasiswa> mahasiswaList = FXCollections.observableArrayList(
            new Mahasiswa("12345", "Andi"),
            new Mahasiswa("12346", "Budi"),
            new Mahasiswa("12347", "Citra"),
            new Mahasiswa("12348", "Dewi"),
            new Mahasiswa("12349", "Eka"),
            new Mahasiswa("12350", "Fajar"),
            new Mahasiswa("12351", "Gita"),
            new Mahasiswa("12352", "Hadi"),
            new Mahasiswa("12353", "Indah"),
            new Mahasiswa("12354", "Joko")
        );

        // Tabel
        TableView<Mahasiswa> table = new TableView<>();
        TableColumn<Mahasiswa, String> nimColumn = new TableColumn<>("NIM");
        nimColumn.setCellValueFactory(new PropertyValueFactory<>("nim"));

        TableColumn<Mahasiswa, String> namaColumn = new TableColumn<>("Nama");
        namaColumn.setCellValueFactory(new PropertyValueFactory<>("nama"));

        table.getColumns().addAll(nimColumn, namaColumn);
        table.setItems(mahasiswaList);

        // Input Fields
        TextField nimField = new TextField();
        nimField.setPromptText("NIM");
        TextField namaField = new TextField();
        namaField.setPromptText("Nama");
        TextField a = new TextField();
        a.setPromptText("Apakah");
        Button ab = new Button("Delete");
        Button addButton = new Button("Add");
        
        ab.setOnAction(e -> {
            String nim = nimField.getText();
            if (!nim.isEmpty()) {
                Mahasiswa target = null;
                for (Mahasiswa m : mahasiswaList) {
                    if (m.getNim().equals(nim)) {
                        target = m;
                        break;
                    }
                }
                if (target != null) {
                    mahasiswaList.remove(target);
                    nimField.clear();
                    Alert alert = new Alert(Alert.AlertType.INFORMATION, "Data mahasiswa berhasil dihapus!", ButtonType.OK);
                    alert.showAndWait();
                } else {
                    Alert alert = new Alert(Alert.AlertType.WARNING, "Mahasiswa dengan NIM tersebut tidak ditemukan.", ButtonType.OK);
                    alert.showAndWait();
                }
            } else {
                Alert alert = new Alert(Alert.AlertType.WARNING, "NIM tidak boleh kosong!", ButtonType.OK);
                alert.showAndWait();
            }
        });

        // Add Button Action
        addButton.setOnAction(e -> {
            String nim = nimField.getText();
            String nama = namaField.getText();

            // Validasi NIM
            if (nim.isEmpty()) {
                Alert alert = new Alert(Alert.AlertType.WARNING, "NIM tidak boleh kosong!", ButtonType.OK);
                alert.showAndWait();
                return;
            }
            if (!nim.matches("\\d+")) {
                Alert alert = new Alert(Alert.AlertType.WARNING, "NIM harus berupa angka!", ButtonType.OK);
                alert.showAndWait();
                return;
            }
            if (nim.length() != 5) {
                Alert alert = new Alert(Alert.AlertType.WARNING, "NIM harus memiliki panjang 5 karakter!", ButtonType.OK);
                alert.showAndWait();
                return;
            }
            // Cek apakah NIM sudah terdaftar
            boolean nimExists = mahasiswaList.stream().anyMatch(m -> m.getNim().equals(nim));
            if (nimExists) {
                Alert alert = new Alert(Alert.AlertType.WARNING, "NIM sudah terdaftar!", ButtonType.OK);
                alert.showAndWait();
                return;
            }

            // Validasi Nama
            if (nama.isEmpty()) {
                Alert alert = new Alert(Alert.AlertType.WARNING, "Nama tidak boleh kosong!", ButtonType.OK);
                alert.showAndWait();
                return;
            }
            if (!nama.matches("[a-zA-Z\\s]+")) {
                Alert alert = new Alert(Alert.AlertType.WARNING, "Nama hanya boleh mengandung huruf dan spasi!", ButtonType.OK);
                alert.showAndWait();
                return;
            }

            // Jika validasi lolos, tambahkan data
            mahasiswaList.add(new Mahasiswa(nim, nama));
            nimField.clear();
            namaField.clear();
            Alert alert = new Alert(Alert.AlertType.INFORMATION, "Data mahasiswa berhasil ditambahkan!", ButtonType.OK);
            alert.showAndWait();
        });

        // Layout
        double height = 600;
        double width = 400;
        double height_v = ((height/width)*10);
        VBox layout = new VBox(height_v, table, nimField, namaField, addButton ,ab);
        Scene scene = new Scene(layout, height, width);

        stage.setScene(scene);
        stage.setTitle("Praktikum 6 - JavaFX");
        stage.show();
    }

}
