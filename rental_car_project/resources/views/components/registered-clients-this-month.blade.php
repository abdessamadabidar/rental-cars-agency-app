<script>
    const ctx4 = document.getElementById("myChart4");

    const request4 = new XMLHttpRequest();
    request4.open("GET", "/number_of_registered_today");
    request4.send();

    const clientsCounts = Array(currentDate.getDate()).fill(0);

    request4.onload = function () {
        if (this.status === 200) {
            const clients = JSON.parse(this.responseText).clients;
            for (const dayCount of clients) {
                clientsCounts[dayCount.day] = dayCount.clients;
            }

        }

        new Chart(ctx4, {
            type: "line",
            data: {
                labels: days,
                datasets: [
                    {
                        label: "Les revenue ce mois en DH",
                        fill: true,
                        borderColor: "rgb(89, 121, 192)",
                        data: clientsCounts,
                        tension: 0.1,
                    },
                ],
            },
        });
    }


</script>
