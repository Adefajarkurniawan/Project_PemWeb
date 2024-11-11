function calculateBMI() {
    const berat = document.getElementById("berat").value;
    const tinggi = document.getElementById("tinggi").value;

    if (berat && tinggi) {
        const tinggiMeter = tinggi / 100; // Konversi cm ke meter
        const bmi = (berat / (tinggiMeter * tinggiMeter)).toFixed(2);

        let kategori;
        if (bmi < 18.5) {
            kategori = "Kekurangan berat badan";
        } else if (bmi < 24.9) {
            kategori = "Normal (sehat)";
        } else if (bmi < 29.9) {
            kategori = "Kelebihan berat badan";
        } else {
            kategori = "Obesitas";
        }

        // Menampilkan hasil di dalam elemen dengan ID 'bmiResult'
        const bmiResultElement = document.getElementById("bmiResult");
        if (bmiResultElement) {
            bmiResultElement.textContent = `BMI Anda: ${bmi} (${kategori})`;
        }

        // Tampilkan pop-up
        document.getElementById("popupBox").style.display = "flex";
    } else {
        alert("Harap masukkan semua data untuk menghitung BMI!");
    }
}

function closePopup() {
    document.getElementById("popupBox").style.display = "none";
}
