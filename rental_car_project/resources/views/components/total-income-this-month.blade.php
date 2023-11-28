<script>
    const ctx2 = document.getElementById("myChart2");
    const currentDate = new Date();
    const LEN = new Date(currentDate.getFullYear(), currentDate.getMonth(), 0).getDate();
    const days = Array.from({length : LEN}, (day, i) => i+1);



    const revnues = Array(currentDate.getDate()).fill(0);


    const request = new XMLHttpRequest();
    request.open("GET", "/income_during_this_month", true);
    request.send();

    request.onload = function () {
        if(this.status === 200) {
            const incomeThisMonth = JSON.parse(this.response);
            for (const income in incomeThisMonth.object) {
                revnues[incomeThisMonth.object[income].day-1] = incomeThisMonth.object[income].total;
            }
        }

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: days,
                datasets: [
                    {
                        label: "Les revenues ce mois en DH",
                        fill: true,
                        borderColor: "rgb(75, 192, 192)",
                        data: revnues,
                        tension: 0.1,
                    },
                ],
            },
        });

    }

</script>
