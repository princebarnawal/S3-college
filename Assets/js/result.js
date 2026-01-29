const studentResults = {
    "S15811": "AASHIK BISHWAMITRA: 85% (Passed)",
    "S15812": "AJITA JYOTI: 90% (Passed)",
    "S15813": "AKHILESH BHATT: 78% (Passed)",
    "S15814": "Basanta sapkota: 85% (Passed)",
    "s15815": "BISHESH SHAHI: % (Passed)",
    "s15816": "BISHNU POUDEL: % (Passed)",
    "s15817": "CHIRANJEEBI PANT: % (Passed)",
    "s15818": "DHARMA RAJ BOHARA: % (Passed)",
    "s15819": "DIKSHYA ADHIKARI: % (Passed)",
    "s15820": "DIPESH PANTA: % (Passed)",
    "s15821": "JIBESH SHRESTHA ANAMANI: % (Passed)",
    "s15822": "KHAGENDRA CHAND: % (Passed)",
    "s15823": "LIZA DWARE: % (Passed)",
    "s15824": "NIKITA NIROULA: % (Passed)",
    "s15825": "NISCHAL PANDEY: % (Passed)",
    "s15826": "NISHAL MANANDHAR: % (Passed)",
    "s15827": "PRAKRITI KHANAL: % (Passed)",
    "s15828": "PRASHANT WAGLE: % (Passed)",
    "s15829": "PRINS KUMAR BARNAWAL: % (Passed)",
    "s15830": "PRITIKA KARKI: % (Passed)",
    "s15831": "PUNAM CHAUDHARY: % (Passed)",
    "s15832": "RAHUL KUMAR GUPTA: % (Passed)",
    "s15833": "RISAV SHRESTHA: % (Passed)",
    "s15834": "RISHAB KARKI: % (Passed)",
    "s15835": "RISTA ACHARYA: % (Passed)",
    "s15839": "SHWAYATA CHAUDHARY: % (Passed)",
    "s15840": "SNEHA ADHIKARI: % (Passed)",
    "s15841": "SONUP KHADGI: % (Passed)",
    "s15842": "SURAJ SAH: % (Passed)",
    "s15843": "SURENDRA MAHATO: % (Passed)",
    "s15844": "SUSHANT BHANDARI: % (Passed)",
    "s15845": "SUSHMITA MAINALI: % (Passed)",
    "s15848": "YOGESH BHATTARAI: % (Passed)"
    
};

function checkResult() {
    const symbol = document.getElementById("symbolNumber").value.toUpperCase();
    const resultDiv = document.getElementById("result");

    if(symbol in studentResults){
        resultDiv.textContent = "Result: " + studentResults[symbol];
    } else {
        resultDiv.textContent = "Result not found. Please check your symbol number.";
    }
}