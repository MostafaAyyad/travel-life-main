<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .payment-form {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
        }
        h2 {
            color: #4facfe;
        }
        #card-element {
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 12px;
            margin-top: 10px;
        }
        button {
            background-color: #4facfe;
            border: none;
        }
        button:hover {
            background-color: #00c6ff;
        }
    </style>
</head>
<body>
    <div class="payment-form">
        <h2 class="text-center mb-4">Car Rental Payment</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('payment.make') }}" method="POST" id="payment-form">
            @csrf
            <div class="mb-3">
                <label class="form-label">Car Type</label>
                <input type="text" name="car_type" class="form-control" placeholder="Type of car" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Receipt</label>
                <input type="date" name="date_of_receipt" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pick Up Time</label>
                <input type="time" name="pick_up_time" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Number of Days</label>
                <input type="number" name="number_of_days" value="1" min="1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Receiving Location</label>
                <input type="text" name="receiving_location" class="form-control" placeholder="Location" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Price ($)</label>
                <input type="number" name="total_price" class="form-control" placeholder="Amount in USD" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Payment Method</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" value="credit_card" checked>
                    <label class="form-check-label">Credit Card</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" value="cash">
                    <label class="form-check-label">Cash on Delivery</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment_method" value="paypal">
                    <label class="form-check-label">PayPal</label>
                </div>
            </div>

            <div class="mb-4" id="card-element"></div>

            <button type="submit" class="btn btn-primary w-100">Pay Now</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");
            const elements = stripe.elements();

            const style = {
                base: {
                    color: "#32325d",
                    fontFamily: 'Arial, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#a0aec0"
                    }
                },
                invalid: {
                    color: "#fa755a",
                    iconColor: "#fa755a"
                }
            };

            const card = elements.create("card", { style: style });
            card.mount("#card-element");

            const cardElement = document.getElementById("card-element");
            const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');

            paymentMethodRadios.forEach(function(radio) {
                radio.addEventListener('change', function(e) {
                    if (e.target.value === "credit_card") {
                        cardElement.style.display = 'block';
                    } else {
                        cardElement.style.display = 'none';
                    }
                });
            });

            if (document.querySelector('input[name="payment_method"]:checked').value !== 'credit_card') {
                cardElement.style.display = 'none';
            }

            const form = document.getElementById("payment-form");
            form.addEventListener("submit", function (event) {
                if (document.querySelector('input[name="payment_method"]:checked').value === 'credit_card') {
                    event.preventDefault();
                    stripe.createToken(card).then(function (result) {
                        if (result.error) {
                            alert(result.error.message);
                        } else {
                            const hiddenInput = document.createElement("input");
                            hiddenInput.setAttribute("type", "hidden");
                            hiddenInput.setAttribute("name", "token");
                            hiddenInput.setAttribute("value", result.token.id);
                            form.appendChild(hiddenInput);
                            form.submit();
                        }
                    });
                }
            });
        });
    </script>

</body>
</html>
