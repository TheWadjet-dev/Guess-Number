# Guess Number Game in Python

This is a simple web-based "Guess the Number" game built using Python and Flask for the backend, with HTML, CSS, and JavaScript for the frontend. The game generates a random number within a specified range, and users attempt to guess it. After each guess, the app provides hints to guide the player closer to the correct number. This project demonstrates basic Flask server functionality and interaction between frontend and backend.

## Project Structure

- **app.py**: The Flask server that initializes the game, handles routes, and processes player guesses.
- **templates/index.html**: The main HTML file, providing the user interface for the guessing game.
- **Dockerfile**: Docker configuration file to containerize the application.

## Prerequisites

To run this project, you'll need:
- [Python 3.10 or later](https://www.python.org/downloads/)
- [Flask](https://flask.palletsprojects.com/) (installed via `pip`)
- [Docker](https://www.docker.com/get-started) (optional, if you want to run the app in a container)

## Running the Application Locally

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-username/guess-number-game
    cd guess-number-game
    ```

2. **Install the dependencies**:
    ```bash
    pip install -r requirements.txt
    ```

3. **Run the Flask application**:
    ```bash
    python app.py
    ```

4. **Access the game**:
   Open your browser and go to `http://localhost:5000` to start playing the Guess Number Game.

## Running the Application with Docker

1. **Build the Docker image**:
    ```bash
    docker build -t guess-number .
    ```

2. **Run the Docker container**:
    ```bash
    docker run -p 5000:5000 guess-number
    ```

3. **Access the game**:
   Open your browser and go to `http://localhost:5000`.

## How to Play

1. **Guess the Number**: Enter a number within the given range and click the "Submit" button.
2. **Receive Feedback**: The game will inform you if your guess is too high, too low, or correct.
3. **Play Again**: After guessing correctly, you can start a new game to try again with a new random number.

## Application Logic Overview

- **Random Number Generation**: A new random number is generated at the start of each game.
- **Hint System**: After each guess, the app gives feedback to guide the player toward the correct answer.
- **Session-based State**: The random number and game state are stored temporarily for the session.

