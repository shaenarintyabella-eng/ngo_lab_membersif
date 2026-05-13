console.log("Ngo Lab Membership Ready!");

document.addEventListener('DOMContentLoaded', function() {

    //  FITUR SAPAAN OTOMATIS BERDASARKAN WAKTU
    const greetingText = document.querySelector('.hello');
    
    if (greetingText) {
        const jam = new Date().getHours();
        let sapaan = "";

        if (jam >= 5 && jam < 11) {
            sapaan = "Selamat Pagi 👋";
        } else if (jam >= 11 && jam < 15) {
            sapaan = "Selamat Siang 👋";
        } else if (jam >= 15 && jam < 18) {
            sapaan = "Selamat Sore 👋";
        } else {
            sapaan = "Selamat Malam 👋";
        }

        greetingText.innerText = sapaan;
    }

    console.log("JavaScript Ngolab Berhasil Dimuat!");
});