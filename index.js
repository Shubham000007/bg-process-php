//* Background process request
const generateBill = document.getElementById("generate_bill");
if (generateBill) {
    generateBill.addEventListener('click', () => {
        $.ajax({
            type: "POST",
            url: "bg_process_2.php",
            data: {},
            success: (res) => {
                alert("Your request is in process, you can wait or come back after 15 minutes");
                location.reload();
            },
            error: () => {
                alert("Sorry, we are unable to process your request, please try again.");
                location.reload();
            }
        });
    })
}