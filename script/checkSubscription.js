const monthNames = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN",
  "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"
];

let checkDate = (subs) => {
    let day = subs.slice(0,2);
    let month = subs.slice(3,6);
    let year = subs.slice(7,9);

    let sub_date = new Date(20+year, monthNames.indexOf(month), day);

    let today = new Date();

    let date = new Date(sub_date);
    date.setDate(date.getDate() + 31);  

    if (!(today <= date)) window.location.href = "usuwanieSubskrypcji.php";
}