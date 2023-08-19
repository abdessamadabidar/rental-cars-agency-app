<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contrat de réservation</title>
</head>
<body style="font-family:Arial, Helvetica, sans-serif">
<table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table
                border="0"
                align="center"
                width="540"
                cellpadding="0"
                cellspacing="0"
            >

                <tr>
                    <td align="center">
                        <table
                            border="0"
                            align="center"
                            width="540"
                            cellpadding="0"
                            cellspacing="0"
                        >
                            <tr>
                                <td align="start" style="font-family: 'Shrikhand', cursive; !important;" >
                                    <a href="" style="display: block;border: 0 none !important;text-decoration: none;">
                                        <h6 style="
													color: #ff734f;
                                                    margin: 0;
												    font-weight: 500;
													font-size: 20px;
													">
                                            Auto Rent
                                        </h6>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td style="font-size: 8px; color: #777">
                                    Robert Robertson, 1234 NW Bobcat
                                    Lane, St. Robert, MO 65584-5678.
                                </td>
                            </tr>
                            <tr>
                                <td height="2" style="font-size: 2px;	line-height: 2px;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 8px; color: #777">
                                    contact.autorent@gmail.com
                                </td>
                            </tr>
                            <tr>
                                <td height="2" style="font-size: 2px;	line-height: 2px;">

                                </td>
                            </tr>
                            <tr >
                                <td style="font-size: 8px; color: #777">
                                    Fax : 05 83 38 16 11 / 05 92 11 02
                                    13
                                </td>
                            </tr>
                            <tr>
                                <td height="2" style="font-size: 2px;	line-height: 2px;">

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 8px; color: #777">
                                    Téléphone : 06 21 34 11 22
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td height="30" style="line-height: 30px">

        </td>
    </tr>
    <tr>
        <td align="center">
            <table
                border="0"
                align="center"
                width="540"
                cellpadding="0"
                cellspacing="0"
            >
                <tr>
                    <td align="center" style="
                        padding: 5px;
                                font-size: 12px;
									border: 1px solid #999;
									background-color: #f8f9fa;
								">
                        CONTRAT DE LOCATION
                    </td>
                </tr>
                <tr>
                    <td height="10" style="font-size: 10px; line-height: 10px">

                    </td>
                </tr>
                <tr>
                    <td style="
									padding: 5px;
									font-size: 10px;
									color: #fff;
									background-color: #343a40;
								">AGENT(E)</td>
                </tr>
                <tr>
                    <td height="10" style="font-size: 10px; line-height: 10px">

                    </td>
                </tr>

                <tr>
                    <table
                        border="0"
                        align="center"
                        width="530"
                        cellpadding="0"
                        cellspacing="0"
                    >
                        <tr>
                            <td align="start" width="50%" style="font-size: 10px">
                                <strong>Nom</strong>
                                : {{ $admin->last_name }}
                            </td>
                            <td align="start" style="font-size: 10px">
                                <strong>Prénom</strong> : {{ $admin->first_name }}
                            </td>
                        </tr>
                        <tr>
                            <td height="10" style="font-size: 10px;	line-height: 10px;">

                            </td>
                        </tr>
                        <tr>
                            <td align="start" style="font-size: 10px">
                                <strong>CIN</strong> : {{ $admin->cin }}
                            </td>
                            <td align="start" style="font-size: 10px">
                                <strong>Adresse</strong>
                                : {{ $admin->address }}
                            </td>
                        </tr>
                        <tr>
                            <td height="10" style=" font-size: 10px; line-height: 10px;">

                            </td>
                        </tr>
                        <tr>
                            <td align="start" style="font-size: 10px">
                                <strong>Adresse email</strong>
                                : {{ $admin->email }}
                            </td>
                            <td align="start" style="font-size: 10px">
                                <strong>Téléphone</strong>
                                : {{ $admin->phone }}
                            </td>
                        </tr>
                    </table>
                </tr>
                <tr>
                    <td height="10" style="font-size: 10px; line-height: 10px">

                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <table
                            border="0"
                            width="540"
                            align="center"
                            cellpadding="0"
                            cellspacing="0"
                        >
                            <tr>
                                <td style="
												padding: 5px;
												font-size: 10px;
												color: #fff;
												background-color: #343a40;
											">CONDUCTEUR LOCATAIRE</td>
                            </tr>
                            <tr>
                                <td height="10" style="
												font-size: 10px;
												line-height: 10px;
											">

                                </td>
                            </tr>

                            <tr>
                                <table
                                    border="0"
                                    align="center"
                                    width="530"
                                    cellpadding="0"
                                    cellspacing="0"
                                >
                                    <tr>
                                        <td align="start" width="50%" style="font-size: 10px">
                                            <strong>Nom</strong>
                                            : {{ $client->last_name }}
                                        </td>
                                        <td align="start" width="50%" style="font-size: 10px">
                                            <strong>Prénom</strong>
                                            : {{ $client->first_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="10" style="
														font-size: 10px;
														line-height: 10px;
													">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="start" width="50%" style="font-size: 10px">
                                            <strong>CIN</strong>
                                            : {{ $client->cin}}
                                        </td>
                                        <td align="start" width="50%" style="font-size: 10px">
                                            <strong>Adresse</strong>
                                            : {{ $client->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td height="10" style="
														font-size: 10px;
														line-height: 10px;
													">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="start" width="50%" style="font-size: 10px">
                                            <strong> Adresse email</strong>
                                            : {{ $client->address }}
                                        </td>
                                        <td align="start" width="50%" style="font-size: 10px">
                                            <strong>Téléphone</strong>
                                            : {{ $client->phone }}
                                        </td>
                                    </tr>
                                </table>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="10" style="font-size: 10px; line-height: 10px">

                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <table
                            border="0"
                            align="center"
                            width="540"
                            cellpadding="0"
                            cellspacing="0"
                        >
                            <tr>
                                <td style="
												padding: 5px;
												font-size: 10px;
												color: #fff;
												background-color: #343a40;
											">LOCATION</td>
                            </tr>
                            <tr>
                                <td height="10" style="font-size: 10px;	line-height: 10px;">

                                </td>
                            </tr>
                            <tr>
                                <table
                                    border="0"
                                    align="center"
                                    width="530"
                                    cellpadding="0"
                                    cellspacing="0"
                                    style="
												border: 1px solid black;
												border-collapse: collapse;
											"
                                >
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th style=" font-size: 10px; padding: 5px; border: 1px solid black; border-collapse: collapse;">Débart</th>
                                        <th style=" font-size: 10px; padding: 5px; border: 1px solid black; border-collapse: collapse;">Retour</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th style=" font-size: 10px; padding: 5px; border: 1px solid black; border-collapse: collapse;">La date</th>
                                        <td style="font-size: 10px; padding: 5px; border: 1px solid black;border-collapse: collapse; text-align: center">
                                            {{ \Carbon\Carbon::createFromDate($reservation->date_debut)->toDateString() }}
                                        </td>
                                        <td style="font-size: 10px; padding: 5px; border: 1px solid black;border-collapse: collapse; text-align: center">
                                            {{ \Carbon\Carbon::createFromDate($reservation->date_fin)->toDateString() }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style=" font-size: 10px; padding: 5px; border: 1px solid black; border-collapse: collapse;">L'heure</th>
                                        <td style="font-size: 10px; padding: 5px; border: 1px solid black;border-collapse: collapse; text-align: center">
                                            {{ \Carbon\Carbon::createFromDate($reservation->date_debut)->toTimeString() }}
                                        </td>
                                        <td style="font-size: 10px; padding: 5px; border: 1px solid black;border-collapse: collapse; text-align: center">
                                            {{ \Carbon\Carbon::createFromDate($reservation->date_fin)->toTimeString() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </tr>
                            <tr>
                                <td height="10" style="
												font-size: 10px;
												line-height: 10px;
											">

                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table
                                        border="0"
                                        width="540"
                                        align="center"
                                        cellpadding="0"
                                        cellspacing="0"
                                    >
                                        <tr>
                                            <td style="
															padding: 5px;
															font-size: 10px;
															color: #fff;
															background-color: #343a40;
														">VÉHICULE:</td>
                                        </tr>
                                        <tr>
                                            <td height="10" style="font-size: 10px;line-height: 10px;">

                                            </td>
                                        </tr>

                                        <tr>
                                            <table
                                                border="0"
                                                align="center"
                                                width="530"
                                                cellpadding="0"
                                                cellspacing="0"
                                            >
                                                <tr>
                                                    <td align="start" width="50%" style="font-size: 10px">
                                                        <strong>Marque</strong>
                                                        : {{ $voiture->marque() }}
                                                    </td>
                                                    <td align="start" width="50%" style="font-size: 10px">
                                                        <strong>Modèle</strong>
                                                        : {{ $voiture->modele() }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" style="font-size: 10px;line-height: 10px;">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="start" width="50%" style="font-size: 10px">
                                                        <strong>Matricule</strong>
                                                        : {{ $voiture->matricule }}
                                                    </td>
                                                    <td align="start" width="50%" style="font-size: 10px">
                                                        <strong>Prix de jour</strong>
                                                        : {{ $voiture->prix }}DH
                                                    </td>
                                                </tr>
                                            </table>
                                        </tr>
                                        <tr>
                                            <td height="25" style="
															font-size: 25px;
															line-height: 25px;
														">

                                            </td>
                                        </tr>
                                        <tr>
                                            <table
                                                border="0"
                                                align="center"
                                                width="540"
                                                cellpadding="0"
                                                cellspacing="0"
                                                style="background-color: #f8f9fa;"
                                            >

                                                <tr>
                                                    <td height="5" style="font-size: 5px;	line-height: 5px;">

                                                    </td>
                                                </tr>
                                                <tr style=" padding: 5px;font-size: 10px;">
                                                    <td width="10" style="font-size: 10px;	word-spacing: 10px;">

                                                    </td>
                                                    <td align="start" width="50%" style="font-size: 10px">
                                                        <strong>Total</strong>
                                                        : {{ $reservation->total }}DH
                                                    </td>
                                                    <td align="start" width="50%" style="font-size: 10px">
                                                        <strong>Date de réservation</strong>
                                                        : {{ $reservation->created_at }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="5" style="font-size: 5px;	line-height: 5px;">

                                                    </td>
                                                </tr>
                                            </table>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!-- end section -->
<table
    border="0"
    width="540"
    cellpadding="0"
    cellspacing="0"
    align="center"
>
    <tr>
        <td height="40" style="font-size: 40px; line-height: 40px">


        </td>
    </tr>

    <tr>
        <td align="center">
            <table
                border="0"
                align="center"
                width="540"
                cellpadding="0"
                cellspacing="0"
            >
                <tr>
                    <td style="font-size: 10px">
                        Date et heure :
                        .....................................
                    </td>
                    <td style="font-size: 10px">signature :</td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td height="60" style="font-size: 60px; line-height: 60px">

        </td>
    </tr>
</table>
</body>
</html>
