# Set in Block

[Set in Block](https://setinblock.com) is a minimalistic web app for creating and reading permanent messages on the Ethereum blockchain.

The app uses [ethjs](https://github.com/ethjs/ethjs) utility to create transactions and allow users to execute them with MetaMask. The transaction's data field is prefilled with the user's message that is converted into a hexadecimal format.

The message reader uses Etherscan API to receive transaction data. The app then converts the hexadecimal message back into UTF-8 and presents it to the user.

There is no back-end code and no database, all logic is on the front-end.

To launch the app download the repository package and open index.html in your browser.

## Issues

Report issues in [issue tracker](https://github.com/dziungles/set-in-block/issues).

## Contribution

Feel free to make a pull request or suggest ideas.
