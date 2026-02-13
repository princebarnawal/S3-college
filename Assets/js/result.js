const studentResults = {
    "S15811": "AASHIK BISHWAMITRA: 85% (Passed)",
    "S15812": "AJITA JYOTI: 90% (Passed)",
    "S15813": "AKHILESH BHATT: 85% (Passed)",
    "S15814": "BASANTA SAPKOTA: 85% (Passed)",
    "S15815": "BISHESH SHAHI: 84% (Passed)",
    "S15816": "BISHNU POUDEL: 84% (Passed)",
    "S15817": "CHIRANJEEBI PANT: 78% (Passed)",
    "S15818": "DHARMA RAJ BOHARA: 66% (Passed)",
    "S15819": "DIKSHYA ADHIKARI: 75% (Passed)",
    "S15820": "DIPESH PANTA: 97% (Passed)",
    "S15821": "JIBESH SHRESTHA ANAMANI: 88% (Passed)",
    "S15822": "KHAGENDRA CHAND: 78% (Passed)",
    "S15823": "LIZA DWARE: 80% (Passed)",
    "S15824": "NIKITA NIROULA: 78% (Passed)",
    "S15825": "NISCHAL PANDEY: 82% (Passed)",
    "S15826": "NISHAL MANANDHAR: 81% (Passed)",
    "S15827": "PRAKRITI KHANAL: 79% (Passed)",
    "S15828": "PRASHANT WAGLE: 83% (Passed)",
    "S15829": "PRINS KUMAR BARNAWAL: 87% (Passed)",
    "S15830": "PRITIKA KARKI: 88% (Passed)",
    "S15831": "PUNAM CHAUDHARY: 79% (Passed)",
    "S15832": "RAHUL KUMAR GUPTA: 83% (Passed)",
    "S15833": "RISAV SHRESTHA: 78% (Passed)",
    "S15835": "RISTA ACHARYA: 79% (Passed)",
    "S15839": "SHWAYATA CHAUDHARY: 79% (Passed)",
    "S15840": "SNEHA ADHIKARI: 79% (Passed)",
    "S15841": "SONUP KHADGI: 81% (Passed)",
    "S15842": "SURAJ SAH: 82% (Passed)",
    "S15843": "SURENDRA MAHATO: 80% (Passed)",
    "S15844": "SUSHANT BHANDARI: 80% (Passed)",
    "S15845": "SUSHMITA MAINALI: 78% (Passed)",
    "S15848": "YOGESH BHATTARAI: 78% (Passed)"
};

function checkResult() {
    const symbol = document.getElementById("symbolNumber").value.trim().toUpperCase();
    const resultDiv = document.getElementById("result");

    if (studentResults.hasOwnProperty(symbol)) {
        resultDiv.textContent = "Result: " + studentResults[symbol];
        resultDiv.style.color = "green";
    } else {
        resultDiv.textContent = "Result not found. Please check your symbol number.";
        resultDiv.style.color = "red";
    }
}
