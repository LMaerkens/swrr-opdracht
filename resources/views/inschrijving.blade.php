<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inschrijving Recreatiewoningen</title>
    <link rel="stylesheet" href="{{ asset('css/inschrijving.css') }}">
</head>
<body>
    @if(session('success'))
        <div id="notification" class="notification show">
            <h3>✓ Inschrijving Verstuurd!</h3>
            <p>{{ session('success') }}</p>
        </div>
    @else
        <div id="notification" class="notification">
            <h3>✓ Inschrijving Verstuurd!</h3>
            <p>Uw inschrijving is succesvol bij ons ingediend. U ontvangt binnenkort een bevestiging per e-mail.</p>
        </div>
    @endif

    <div class="container">
        <div class="header">
            <h1>Inschrijving Najaar & Kerstvakantie 2026</h1>
            <p>Dit ingevulde formulier mailen aan: <strong>srww@ziggo.nl</strong></p>
        </div>

        <div class="form-content">
            <form method="POST" action="{{ route('inschrijving.submit') }}">
                @csrf
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
                            <input type="radio" name="holiday" value="herfst" {{ old('holiday') === 'herfst' ? 'checked' : '' }}>
                            <span>
                                <strong>HERFSTVAKANTIE</strong><br>
                                vrijdag 9 oktober t/m vrijdag 16 oktober
                            </span>
                        </label>

                        <label class="holiday-option">
                            <input type="radio" name="holiday" value="kerstweek52" {{ old('holiday') === 'kerstweek52' ? 'checked' : '' }}>
                            <span>
                                <strong>KERSTVAKANTIE WEEK 52</strong><br>
                                vrijdag 18 december t/m vrijdag 25 december
                            </span>
                        </label>

                        <label class="holiday-option">
                            <input type="radio" name="holiday" value="kerstweek1" {{ old('holiday') === 'kerstweek1' ? 'checked' : '' }}>
                            <span>
                                <strong>KERSTVAKANTIE WEEK 1</strong><br>
                                vrijdag 25 december t/m vrijdag 1 januari 2027
                            </span>
                        </label>

                        <label class="holiday-option">
                            <input type="radio" name="holiday" value="lente" {{ old('holiday') === 'lente' ? 'checked' : '' }}>
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
                                <input type="date" name="keus1_van" value="{{ old('keus1_van') }}">
                            </div>
                            <div>
                                <label style="font-size: 12px;">Tot</label>
                                <input type="date" name="keus1_tot" value="{{ old('keus1_tot') }}">
                            </div>
                            <div></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;">2e Keus</label>
                        <div class="date-inputs">
                            <div>
                                <label style="font-size: 12px;">Van</label>
                                <input type="date" name="keus2_van" value="{{ old('keus2_van') }}">
                            </div>
                            <div>
                                <label style="font-size: 12px;">Tot</label>
                                <input type="date" name="keus2_tot" value="{{ old('keus2_tot') }}">
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
                                <input type="checkbox" name="huisje[]" value="vlieland">
                                <label style="margin: 0; cursor: pointer;">Vlieland</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje[]" value="ameland">
                                <label style="margin: 0; cursor: pointer;">Ameland</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje[]" value="julianadorp">
                                <label style="margin: 0; cursor: pointer;">Julianadorp aan Zee</label>
                            </label>
                        </div>
                        <div class="house-options">
                            <label class="house-option">
                                <input type="checkbox" name="huisje[]" value="terschelling">
                                <label style="margin: 0; cursor: pointer;">Terschelling</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje[]" value="schiermonnikoog">
                                <label style="margin: 0; cursor: pointer;">Schiermonnikoog</label>
                            </label>

                            <label class="house-option">
                                <input type="checkbox" name="huisje[]" value="echten">
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
                    <button type="button" class="btn-back" onclick="if (window.history.length > 1) { window.history.back(); } else { window.location.href = '{{ route('home') }}'; }">Terug</button>
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
