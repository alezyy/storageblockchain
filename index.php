<?php


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
</head>
<body>

<script>
    window.onload = function () {
// check to see if user has metamask addon installed on his browser. check to make sure web3 is defined
        if (typeof web3 === 'undefined') {
            document.getElementById('metamask').innerHTML = 'You need <a href="https://metamask.io/">MetaMask</a> browser plugin to run this example'
        }
// call the getvalue function here
     //   setvalue();
        getvalue();
    }

    //function to retrieve the last inserted value on the blockchain
    function getvalue() {
        try {
            // contract Abi defines all the variables,constants and functions of the smart contract. replace with your own abi
            var abi = [
                {
                    "constant": false,
                    "inputs": [
                        {
                            "name": "x",
                            "type": "uint256"
                        }
                    ],
                    "name": "set",
                    "outputs": [],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "get",
                    "outputs": [
                        {
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                }
            ]
            //contract address. please change the address to your own
            var contractaddress = '0xf882a58e5ef50c445bc35fe9a8c00fd9b56c578b';
            //instantiate and connect to contract address via Abi
            var myAbi = web3.eth.contract(abi);
            var myfunction = myAbi.at(contractaddress);
            //call the get function of our SimpleStorage contract
            myfunction.get.call(function (err, xname) {
                if (err) { console.log(err) }
                if (xname) {
                    //display value on the webpage
                    document.getElementById("xbalance").innerHTML = "last inserted value into the blockchain is : " + xname;
                }
            });
        }
        catch (err) {
            document.getElementById("xbalance").innerHTML = err;
        }
    }

    // function to add a new integer value to the blockchain
    function setvalue() {

      //  try {
            // contract Abi defines all the variables,constants and functions of the smart contract. replace with your own abi
            var abi = [
                {
                    "constant": false,
                    "inputs": [
                        {
                            "name": "x",
                            "type": "uint256"
                        }
                    ],
                    "name": "set",
                    "outputs": [],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "get",
                    "outputs": [
                        {
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                }
            ]
            //contract address. please change the address to your own
            var contractaddress = '0xc6116320864f82ac3cceddcc4c6122e3b1e3efe6';
            //instantiate and connect to contract address via Abi
        
            var myAbi = web3.eth.contract(abi);
            var myfunction = myAbi.at(contractaddress);
            //call the set function of our SimpleStorage contract
            myfunction.set.sendTransaction(document.getElementById("xvalue").value, { from: web3.eth.accounts[0], gas: 4000000 }, function (error, result) {
                if (!error) {
                    console.log(result);
                } else {
                    console.log(error);
                }
            })


       /* } catch (err) {
            document.getElementById("xvalue").innerHTML = err;
        }*/
    }

</script>

<center>
    <div id="metamask"></div>
    <h3>Insert and retrieve value on the blockchain</h3>
    <br />
    <table>
        <tr>
            <td></td>
            <td>
                <div id="xbalance"></div>
            </td>
        </tr>
        <tr>
            <td>Insert a new value :</td>
            <td>
                <input id="xvalue" type="text" />
                <input id="Button1" type="button" onclick="setvalue()" value="Add to Blockchain" />
            </td>
        </tr>
    </table>
</center>
</body>
</html>

