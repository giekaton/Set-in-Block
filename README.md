<a href="https://setinblock.com" target="_blank"><img src="https://setinblock.com/img/logo-github.png" width="100"></a>

## About Set in Block

[Set in Block](https://setinblock.com) is an open-source decentralized application (dApp) for publishing, protecting, and reading data from the Ethereum blockchain.

The data stored in the blockchain is permanent and cannot be modified, similarly to the idiom <i>set in stone</i>, which is used to describe something that cannot be changed.

Set in Block mission is to promote long-term thinking.

With Set in Block, you can read and write data to the blockchain. Use the Reader to read permanent messages and NFTs, stored in the Ethereum blockchain. Use the Writer to publish permanent messages, protect content copyrights.

## Architecture

Set in Block is based on Laravel 8 and Vue.js 3. It doesn't use a server-side database, since all content on Set in Block comes from the Ethereum blockchain.

The Reader uses [Infura](https://infura.io/), [Alchemy](https://www.alchemy.com/), [Etherscan](https://etherscan.io/), and [OpenSea](https://opensea.io/) APIs.

The Writer uses [web3](https://github.com/ChainSafe/web3.js), [web3Modal](https://github.com/Web3Modal/web3modal), and [WalletConnect](https://github.com/WalletConnect/walletconnect-monorepo) JavaScript libraries to establish a connection with the Ethereum blockchain, prepare and sign transactions client-side, and allow users to broadcast them with their Ethereum wallets.
## Quicklaunch

- Git clone the repository
- Rename and update file `env.example` to `env`
- Run `composer install`
- Run `npm install`
- To start local environment, run `npm run watch`
- To build for production, run `npm run prod`

## License

Set in Block is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Issues

Report issues in the [issue tracker](https://github.com/giekaton/set-in-block/issues).

## Contribution

Feel free to make a pull request or suggest ideas.