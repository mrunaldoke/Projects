let currentPlayer = 'X';
let board = ['', '', '', '', '', '', '', '', ''];
let gameOver = false;

function handleClick(index) {
  if (!gameOver && board[index] === '') {
    board[index] = currentPlayer;
    renderBoard();
    checkWinner();
    currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
  }
}

function checkWinner() {
  const winningCombos = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], // Rows
    [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columns
    [0, 4, 8], [2, 4, 6]             // Diagonals
  ];

  for (let combo of winningCombos) {
    const [a, b, c] = combo;
    if (board[a] && board[a] === board[b] && board[a] === board[c]) {
      gameOver = true;
      document.getElementById('message').textContent = `${currentPlayer} wins!`;
      return;
    }
  }

  if (!board.includes('')) {
    gameOver = true;
    document.getElementById('message').textContent = "It's a tie!";
  }
}

function renderBoard() {
  const cells = document.querySelectorAll('.cell');
  board.forEach((value, index) => {
    cells[index].textContent = value;
  });
}

function resetGame() {
  currentPlayer = 'X';
  board = ['', '', '', '', '', '', '', '', ''];
  gameOver = false;
  document.getElementById('message').textContent = '';
  renderBoard();
}
