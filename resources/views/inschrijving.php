<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inschrijving Recreatiewoningen</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1E5AA8 0%, #2E7BB8 100%);
            padding: 40px 20px;
            text-align: center;
            color: white;
            border-bottom: 5px solid #F4C430;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .header p {
            font-size: 14px;
            opacity: 0.95;
        }

        .form-content {
            padding: 40px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            background: #1E5AA8;
            color: white;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            border-left: 4px solid #F4C430;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #1E5AA8;
            box-shadow: 0 0 0 3px rgba(30, 90, 168, 0.1);
        }

        textarea {
            min-height: 80px;
            resize: vertical;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-row-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 12px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 0 0 calc(50% - 10px);
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #F4C430;
        }

        .checkbox-item label {
            margin-bottom: 0;
            font-weight: 400;
            cursor: pointer;
        }

        .date-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
            margin-top: 10px;
            font-size: 13px;
        }

        .date-inputs input {
            padding: 10px;
        }

        .house-options {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
            margin-top: 12px;
        }

        .house-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .house-option:hover {
            border-color: #1E5AA8;
            background-color: #f8fbff;
        }

        .house-option input[type="checkbox"] {
            flex-shrink: 0;
        }

        .house-option label {
            margin-bottom: 0;
            cursor: pointer;
            font-weight: 400;
        }

        .holiday-options {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 12px;
        }

        .holiday-option {
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .holiday-option:hover {
            border-color: #1E5AA8;
            background-color: #f8fbff;
        }

        .holiday-option input[type="checkbox"] {
            flex-shrink: 0;
        }

        .holiday-option label {
            margin-bottom: 0;
            font-weight: 500;
            cursor: pointer;
        }

        .note {
            background-color: #FFF9E6;
            border-left: 4px solid #F4C430;
            padding: 12px 16px;
            margin: 15px 0;
            border-radius: 4px;
            font-size: 13px;
            color: #5a5a5a;
        }

        .terms {
            background-color: #f8f9fa;
            border: 2px solid #e0e0e0;
            border-radius: 4px;
            padding: 20px;
            margin: 30px 0;
            font-size: 13px;
            line-height: 1.6;
            color: #2c3e50;
        }

        .terms h3 {
            color: #1E5AA8;
            margin-bottom: 15px;
            font-size: 15px;
        }

        .terms ol {
            margin-left: 20px;
        }

        .terms li {
            margin-bottom: 12px;
        }

        .tariff-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }

        .tariff-table th,
        .tariff-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .tariff-table th {
            background-color: #1E5AA8;
            color: white;
            font-weight: 600;
        }

        .tariff-table tr:hover {
            background-color: #f8f9fa;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #e0e0e0;
        }

        button {
            padding: 12px 32px;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit {
            background: linear-gradient(135deg, #1E5AA8 0%, #2E7BB8 100%);
            color: white;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(30, 90, 168, 0.3);
        }

        .btn-reset {
            background-color: #e0e0e0;
            color: #2c3e50;
        }

        .btn-reset:hover {
            background-color: #d0d0d0;
        }

        .required {
            color: #e74c3c;
        }

        .lid-section {
            display: none;
        }

        .lid-section.show {
            display: block;
        }

        .notification {
            display: none;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
            color: white;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            max-width: 500px;
            text-align: center;
            animation: slideIn 0.3s ease-out;
        }

        .notification.show {
            display: block;
        }

        .notification h3 {
            margin: 0 0 5px 0;
            font-size: 18px;
            font-weight: 600;
        }

        .notification p {
            margin: 0;
            font-size: 14px;
            opacity: 0.95;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
        }

        @keyframes slideOut {
            from {
                opacity: 1;
                transform: translateX(-50%) translateY(0);
            }
            to {
                opacity: 0;
                transform: translateX(-50%) translateY(-20px);
            }
        }

        .notification.hide {
            animation: slideOut 0.3s ease-out forwards;
        }

        @media (max-width: 768px) {
            .form-row,
            .form-row-3,
            .house-options {
                grid-template-columns: 1fr;
            }

            .checkbox-item {
                flex: 0 0 100%;
            }

            .header h1 {
                font-size: 22px;
            }

            .form-content {
                padding: 20px;
            }

            .notification {
                max-width: calc(100vw - 40px);
                left: 20px;
                right: 20px;
                transform: none;
            }
        }
    </style>
</head>
<body>
    <div id="notification" class="notification">
        <h3>✓ Inschrijving Verstuurd!</h3>
        <p>Uw inschrijving is succesvol bij ons ingediend. U ontvangt binnenkort een bevestiging per e-mail.</p>
    </div>

    <div class="container">
        <div class="header">
            <h1>Inschrijving Najaar & Kerstvakantie 2026</h1>
            <p>Dit ingevulde formulier mailen aan: <strong>srww@ziggo.nl</strong></p>
        </div>

        <div class="form-content">
            <form method="POST" action="/submit">
                <!-- Persoonlijke Gegevens -->
                <div class="form-section">
                    <div class="section-title">Persoonlijke Gegevens</div>
                    
                    <div class="form-group">
                        <label for="naam">Naam <span class="required">*</span></label>
                        <input type="text" id="naam" name="naam" required>
                    </div>

                    <div class="form-group">
                        <label for="adres">Adres <span class="required">*</span></label>
                        <input type="text" id="adres" name="adres" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="postcode">Postcode en Plaats <span class="required">*</span></label>
                            <input type="text" id="postcode" name="postcode" required>
                        </div>
                        <div class="form-group">
                            <label for="telefoon">Telefoonnummer Privé <span class="required">*</span></label>
                            <input type="tel" id="telefoon" name="telefoon" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail Adres <span class="required">*</span></label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="personen">Aantal Personen (i.v.m. toeristenbelasting) <span class="required">*</span></label>
                        <input type="text" id="personen" name="personen" required>
                    </div>

                    <div class="form-group">
                        <label>Ben je lid? <span class="required">*</span></label>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="radio" id="lid_ja" name="ben_je_lid" value="ja" onchange="toggleLidNumber()">
                                <label for="lid_ja">Ja</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="lid_nee" name="ben_je_lid" value="nee" onchange="toggleLidNumber()">
                                <label for="lid_nee">Nee</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group lid-section" id="lidnummer-section">
                        <label for="lidnummer">Zo ja, vul hier je lidnummer in:</label>
                        <input type="text" id="lidnummer" name="lidnummer" placeholder="Lidnummer">
                    </div>

                    <div class="note">
                        <strong>LET OP:</strong> Slechts 1 inschrijving per formulier. Max. 3 verschillende inschrijfformulieren per persoon.
                    </div>
                </div>

                <!-- Vakantieperiode -->
                <div class="form-section">
                    <div class="section-title">Vakantieperiode - NAJAAR 1</div>
                    
                    <p style="margin-bottom: 15px; font-size: 13px; color: #666;">
                        Per persoon kan slechts één van de vakantieweken (herfst- óf kerstvakantie) worden toegewezen op basis van volgorde loting!
                    </p>

                    <div class="holiday-options">
                        <label class="holiday-option">
                            <input type="checkbox" name="holiday" value="herfst">
                            <span>
                                <strong>HERFSTVAKANTIE</strong><br>
                                vrijdag 9 oktober t/m vrijdag 16 oktober
                            </span>
                        </label>

                        <label class="holiday-option">
                            <input type="checkbox" name="holiday" value="kerstweek52">
                            <span>
                                <strong>KERSTVAKANTIE WEEK 52</strong><br>
                                vrijdag 18 december t/m vrijdag 25 december
                            </span>
                        </label>

                        <label class="holiday-option">
                            <input type="checkbox" name="holiday" value="kerstweek1">
                            <span>
                                <strong>KERSTVAKANTIE WEEK 1</strong><br>
                                vrijdag 25 december t/m vrijdag 1 januari 2027
                            </span>
                        </label>

                        <label class="holiday-option">
                            <input type="checkbox" name="holiday" value="lente">
                            <span>
                                <strong>LENTE</strong><br>
                                vrijdag 3 januari t/m vrijdag 25 april (m.u.v. krokusvakantie)
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Verblijf Type -->
                <div class="form-section">
                    <div class="section-title">Type Verblijf</div>
                    
                    <div class="form-group">
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="radio" id="week" name="type_verblijf" value="week">
                                <label for="week">Week</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="weekend" name="type_verblijf" value="weekend">
                                <label for="weekend">Weekend</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="radio" id="midweek" name="type_verblijf" value="midweek">
                                <label for="midweek">Midweek</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;">1e Keus</label>
                        <div class="date-inputs">
                            <div>
                                <label style="font-size: 12px;">Van</label>
                                <input type="text" placeholder="dd-mm-jjjj" name="keus1_van">
                            </div>
                            <div>
                                <label style="font-size: 12px;">Tot</label>
                                <input type="text" placeholder="dd-mm-jjjj" name="keus1_tot">
                            </div>
                            <div></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;">2e Keus</label>
                        <div class="date-inputs">
                            <div>
                                <label style="font-size: 12px;">Van</label>
                                <input type="text" placeholder="dd-mm-jjjj" name="keus2_van">
                            </div>
                            <div>
                                <label style="font-size: 12px;">Tot</label>
                                <input type="text" placeholder="dd-mm-jjjj" name="keus2_tot">
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>

                <!-- Gewenst Zomerhuisje -->
                <div class="form-section">
                    <div class="section-title">Gewenst Zomerhuisje</div>
                    
                    <div class="note">
                        Geef uw voorkeur aan met een cijfer (1 = eerste keus, 2 = tweede keus, etc.)
                    </div>

                    <div class="form-group">
                        <div class="house-options">
                            <label class="house-option">
                                <input type="checkbox" name="huisje" value="vlieland">
                                <label style="margin: 0; cursor: pointer;">Vlieland</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje" value="ameland">
                                <label style="margin: 0; cursor: pointer;">Ameland</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje" value="julianadorp">
                                <label style="margin: 0; cursor: pointer;">Julianadorp aan Zee</label>
                            </label>
                        </div>
                        <div class="house-options">
                            <label class="house-option">
                                <input type="checkbox" name="huisje" value="terschelling">
                                <label style="margin: 0; cursor: pointer;">Terschelling</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje" value="schiermonnikoog">
                                <label style="margin: 0; cursor: pointer;">Schiermonnikoog</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje" value="echten">
                                <label style="margin: 0; cursor: pointer;">Echten</label>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Toelichting -->
                <div class="form-section">
                    <div class="section-title">Eventuele Toelichting</div>
                    
                    <div class="form-group">
                        <textarea id="toelichting" name="toelichting" placeholder="Voeg hier eventuele opmerkingen toe..."></textarea>
                    </div>
                </div>

                <!-- Voorwaarden -->
                <div class="form-section">
                    <div class="section-title">Algemene Voorwaarden & Tarieven</div>
                    
                    <div class="terms">
                        <h3>U gaat akkoord met de volgende voorwaarden:</h3>
                        <ol>
                            <li>Tarief per week is weergegeven in onderstaande tabel.</li>
                            <li>Buiten de vakantieweken en zomerperiode geldt tevens de mogelijkheid voor een weekend/midweek. Weekend-/midweektarief is de helft van het weektarief.</li>
                            <li>Hoewel het ene huisje mooier en groter is dan het andere, is de huurprijs toch voor alle huisjes gelijk. Er is daarbij ook rekening gehouden met de bootkosten naar de eilanden. Uitgangspunt is dat ook de mooiste huisjes voor iedereen betaalbaar moeten blijven.</li>
                            <li>De huurprijzen zijn inclusief verbruik van water, gas en elektriciteit, de door de Stichting verschuldigde toeristenbelasting en 21% BTW (per 1-1-2026 is BTW verhoogd van 9% naar 21%).</li>
                            <li>Na ontvangst van de brief of mail met daarin vermeld de toewijzing dient de helft van het totaal verschuldigde bedrag te worden betaald aan de Stichting. De 2e helft dient 3 weken vóór de toegewezen huurperiode te worden voldaan.</li>
                            <li>Bij inschrijving verplicht men zich, in geval van toewijzing, tot betaling van de gehele huursom. Dit geldt ook wanneer men later tot annulering overgaat, tenzij alsnog een andere huurder kan worden gevonden. Aanbevolen wordt dit risico af te dekken via een annuleringsverzekering.</li>
                            <li>Verhuur aan derden is met ingang van 2024 niet meer mogelijk.</li>
                        </ol>

                        <h3 style="margin-top: 20px;">Weektarieven 2026</h3>
                        <table class="tariff-table">
                            <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Tarief</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Zomervakantie (schoolvakanties noord/midden/zuid)</td>
                                    <td><strong>€ 550,-</strong></td>
                                </tr>
                                <tr>
                                    <td>Krokus-/Mei-/Herfst-/Kerstvakantie</td>
                                    <td><strong>€ 450,-</strong></td>
                                </tr>
                                <tr>
                                    <td>Perioden tussen krokus- en herfstvakantie</td>
                                    <td><strong>€ 400,-</strong></td>
                                </tr>
                                <tr>
                                    <td>Overige perioden</td>
                                    <td><strong>€ 375,-</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="akkoord" required>
                            <span style="font-weight: 500;">Ik ga akkoord met bovenstaande voorwaarden en tarieven <span class="required">*</span></span>
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="form-actions">
                    <button type="reset" class="btn-reset">Wissen</button>
                    <button type="submit" class="btn-submit">Inschrijving Versturen</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleLidNumber() {
            const lidSection = document.getElementById('lidnummer-section');
            const lidJa = document.getElementById('lid_ja').checked;
            
            if (lidJa) {
                lidSection.classList.add('show');
            } else {
                lidSection.classList.remove('show');
            }
        }

        // Notificatie bij formulier verzenden
        document.querySelector('form').addEventListener('submit', function(e) {
            const notification = document.getElementById('notification');
            notification.classList.add('show');
            
            // Notificatie na 5 seconden uitfaden
            setTimeout(() => {
                notification.classList.add('hide');
                setTimeout(() => {
                    notification.classList.remove('show', 'hide');
                }, 300);
            }, 5000);
        });
    </script>
</body>
</html>
