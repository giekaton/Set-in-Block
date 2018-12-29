# Set in Block

[Set in Block](https://setinblock.com) is a web app for creating and reading immutable and indestructible messages on the Ethereum blockchain.

The app uses [ethjs](https://github.com/ethjs/ethjs) utility to create transactions and allow users to execute them with MetaMask. The transaction's data field is prefilled with the user's message that is converted into a hexadecimal format.

The message reader uses Etherscan API to receive transaction data. The app then converts the hexadecimal message back into UTF-8 and presents it to the user.

There is no back-end code and no database, all logic is on the front-end, written in Vue.js.

## Quickstart

#### Project setup
```
npm install
```

#### Compiles and hot-reloads for development
```
npm run serve
```

#### Compiles and minifies for production
```
npm run build
```

## Issues

Report issues in [issue tracker](https://github.com/giekaton/set-in-block/issues).

## Contribution

Feel free to make a pull request or suggest ideas.
