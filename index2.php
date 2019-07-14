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
                            "name": "_address",
                            "type": "address"
                        },
                        {
                            "name": "_sId",
                            "type": "uint256"
                        },
                        {
                            "name": "_fName",
                            "type": "string"
                        },
                        {
                            "name": "_lName",
                            "type": "string"
                        },
                        {
                            "name": "_schoolName",
                            "type": "string"
                        },
                        {
                            "name": "_country",
                            "type": "string"
                        },
                        {
                            "name": "_sdescription",
                            "type": "string"
                        }
                    ],
                    "name": "setStudent",
                    "outputs": [],
                    "payable": false,
                    "stateMutability": "nonpayable",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "countStudents",
                    "outputs": [
                        {
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [
                        {
                            "name": "_address",
                            "type": "address"
                        }
                    ],
                    "name": "getStudent",
                    "outputs": [
                        {
                            "name": "",
                            "type": "uint256"
                        },
                        {
                            "name": "",
                            "type": "string"
                        },
                        {
                            "name": "",
                            "type": "string"
                        },
                        {
                            "name": "",
                            "type": "string"
                        },
                        {
                            "name": "",
                            "type": "string"
                        },
                        {
                            "name": "",
                            "type": "string"
                        }
                    ],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [],
                    "name": "getStudent",
                    "outputs": [
                        {
                            "name": "",
                            "type": "address[]"
                        }
                    ],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                },
                {
                    "constant": true,
                    "inputs": [
                        {
                            "name": "",
                            "type": "uint256"
                        }
                    ],
                    "name": "studentAccts",
                    "outputs": [
                        {
                            "name": "",
                            "type": "address"
                        }
                    ],
                    "payable": false,
                    "stateMutability": "view",
                    "type": "function"
                }
            ]

            //contract address. please change the address to your own
            var contractaddress = '0x8ca5d830a6e99f57b45e34f4af4fc019b8b0e1fb';
            //instantiate and connect to contract address via Abi
            var myAbi = web3.eth.contract(abi);
            var myfunction = myAbi.at(contractaddress);
            //call the get function of our SimpleStorage contract

            var address = '0x49b7b388019e742cd0d9ac47492e63d8f554b0e8a060fc774bbf98168987e21a';

            myfunction.getStudent.call(address, (err, res) => {

                if (err) {
                    console.log(err)
                }

                if (res) {
                    document.getElementById("xbalance").innerHTML = "The student address in the blockchain is : " + address;
                    document.getElementById("xfname").innerHTML = "The Firstname : " + res[1];
                    document.getElementById("xlname").innerHTML = "The Lastname : " + res[2];
                    document.getElementById("xschool").innerHTML = "The School : " + res[3];
                    document.getElementById("xcountry").innerHTML = "The Country : " + res[4];
                    document.getElementById("xdescription").innerHTML = "The Description : " + res[5];
                }
            })

        } catch (err) {
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
                        "name": "_address",
                        "type": "address"
                    },
                    {
                        "name": "_sId",
                        "type": "uint256"
                    },
                    {
                        "name": "_fName",
                        "type": "string"
                    },
                    {
                        "name": "_lName",
                        "type": "string"
                    },
                    {
                        "name": "_schoolName",
                        "type": "string"
                    },
                    {
                        "name": "_country",
                        "type": "string"
                    },
                    {
                        "name": "_sdescription",
                        "type": "string"
                    }
                ],
                "name": "setStudent",
                "outputs": [],
                "payable": false,
                "stateMutability": "nonpayable",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [],
                "name": "countStudents",
                "outputs": [
                    {
                        "name": "",
                        "type": "uint256"
                    }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [
                    {
                        "name": "_address",
                        "type": "address"
                    }
                ],
                "name": "getStudent",
                "outputs": [
                    {
                        "name": "",
                        "type": "uint256"
                    },
                    {
                        "name": "",
                        "type": "string"
                    },
                    {
                        "name": "",
                        "type": "string"
                    },
                    {
                        "name": "",
                        "type": "string"
                    },
                    {
                        "name": "",
                        "type": "string"
                    },
                    {
                        "name": "",
                        "type": "string"
                    }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [],
                "name": "getStudent",
                "outputs": [
                    {
                        "name": "",
                        "type": "address[]"
                    }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            },
            {
                "constant": true,
                "inputs": [
                    {
                        "name": "",
                        "type": "uint256"
                    }
                ],
                "name": "studentAccts",
                "outputs": [
                    {
                        "name": "",
                        "type": "address"
                    }
                ],
                "payable": false,
                "stateMutability": "view",
                "type": "function"
            }
        ]

        //contract address. please change the address to your own
        var contractaddress = '0x985efccac402290a57334e36d5596e18f864937d';
        //instantiate and connect to contract address via Abi

        var myAbi = web3.eth.contract(abi);
        var myfunction = myAbi.at(contractaddress);
        //call the set function of our SimpleStorage contract


        myfunction.setStudent(document.getElementById("xvalue").value, 999, 1235, Paul, 234, Beta, 766, (err, res) =>{
            console.log("this is my result", res);
            if(err){
                console.log(err)
            }
        });


        /* myfunction.set.sendTransaction(document.getElementById("xvalue").value, { from: web3.eth.accounts[0], gas: 4000000 }, function (error, result) {
            if (!error) {
                console.log(result);
            } else {
                console.log(error);
            }
        }) */


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
            <td></td>
            <td>
                <div id="xfname"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div id="xlname"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div id="xschool"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div id="xcountry"></div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div id="xdescription"></div>
            </td>
        </tr>
        <br>

    </table>

    <hr>

    <table>

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

