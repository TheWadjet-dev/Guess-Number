from flask import Flask, render_template, request, redirect, url_for
import random

app = Flask(__name__)

# Global variable to store the secret number and attempts
secret_number = random.randint(1, 100)
attempts = 0

@app.route("/", methods=["GET", "POST"])
def index():
    global attempts, secret_number

    if request.method == "POST":
        # Get the user's guess from the form
        guess = request.form["guess"]
        try:
            guess = int(guess)
            attempts += 1
            if guess < secret_number:
                message = "Too low! Try again."
                color = "red"
            elif guess > secret_number:
                message = "Too high! Try again."
                color = "red"
            else:
                message = f"Congratulations! You guessed the number in {attempts} attempts."
                color = "green"
                secret_number = random.randint(1, 100)  # Reset the game with a new secret number
                attempts = 0  # Reset attempts after winning
        except ValueError:
            message = "Please enter a valid number."
            color = "red"
        return render_template("index.html", message=message, color=color, attempts=attempts)

    return render_template("index.html", message="I'm thinking of a number between 1 and 100.", color="black", attempts=attempts)

if __name__ == "__main__":
    app.run(debug=True)
