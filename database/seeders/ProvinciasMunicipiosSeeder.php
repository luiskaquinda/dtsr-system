<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Provincia;
use App\Models\Municipio;

class ProvinciasMunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $bengo = Provincia::create([
            'abreviacao_provincia' => 'BGO', 
            'nome_provincia' => 'Bengo'
        ]);

        $bengo->municipios()
            ->createMany([
                ['nome_municipio' => 'Ambriz'],
                ['nome_municipio' => 'Bula Atumba'],
                ['nome_municipio' => 'Dande'],
                ['nome_municipio' => 'Dembos'],
                ['nome_municipio' => 'Nambuangongo'],
                ['nome_municipio' => 'Pango Aluquém'],
            ]);

        $benguela = Provincia::create([
            'abreviacao_provincia' => 'BLA', 
            'nome_provincia' => 'Benguela'
        ]);

        $benguela->municipios()
            ->createMany([
                ['nome_municipio' => 'Baía Farta'],
                ['nome_municipio' => 'Balombo'],
                ['nome_municipio' => 'Benguela'],
                ['nome_municipio' => 'Bocoio'],
                ['nome_municipio' => 'Caimbambo'],
                ['nome_municipio' => 'Catumbela'],
                ['nome_municipio' => 'Chongoroi'],
                ['nome_municipio' => 'Cubal'],
                ['nome_municipio' => 'Ganda'],
                ['nome_municipio' => 'Lobito'],
            ]);

        $bie = Provincia::create([
            'abreviacao_provincia' => 'BIE', 
            'nome_provincia' => 'Bié'
        ]);

        $bie->municipios()
            ->createMany([
                ['nome_municipio' => 'Andulo'],
                ['nome_municipio' => 'Camacupa'],
                ['nome_municipio' => 'Catabola'],
                ['nome_municipio' => 'Chinguar'],
                ['nome_municipio' => 'Chitembo'],
                ['nome_municipio' => 'Cuemba'],
                ['nome_municipio' => 'Cunhinga'],
                ['nome_municipio' => 'Cuíto'],
                ['nome_municipio' => 'Nharea'],
            ]);

        $cabinda = Provincia::create([
            'abreviacao_provincia' => 'CDA', 
            'nome_provincia' => 'Cabinda'
        ]);

        $cabinda->municipios()
            ->createMany([
                ['nome_municipio' => 'Cabinda'],
                ['nome_municipio' => 'Cacongo'],
                ['nome_municipio' => 'Buco-Zau'],
                ['nome_municipio' => 'Belize'],
            ]);

        $cuandoCubango = Provincia::create([
            'abreviacao_provincia' => 'CCU',
            'nome_provincia' => 'Cuando Cubango'
        ]);

        $cuandoCubango->municipios()
            ->createMany([
                ['nome_municipio' => 'Calai'],
                ['nome_municipio' => 'Cuangar'],
                ['nome_municipio' => 'Cuchi'],
                ['nome_municipio' => 'Cuito Cuanavale'],
                ['nome_municipio' => 'Dirico'],
                ['nome_municipio' => 'Mavinga'],
                ['nome_municipio' => 'Menongue'],
                ['nome_municipio' => 'Nancova'],
                ['nome_municipio' => 'Rivungo'],
            ]);

        $cuanzaNorte = Provincia::create([
            'abreviacao_provincia' => 'CNO',
            'nome_provincia' => 'Cuanza Norte'
        ]);

        $cuanzaNorte->municipios()
            ->createMany([
                ['nome_municipio' => 'Ambaca'],
                ['nome_municipio' => 'Banga'],
                ['nome_municipio' => 'Bolongongo'],
                ['nome_municipio' => 'Cambembe'],
                ['nome_municipio' => 'Cazengo'],
                ['nome_municipio' => 'Golungo Alto'],
                ['nome_municipio' => 'Gonguembo'],
                ['nome_municipio' => 'Lucala'],
                ['nome_municipio' => 'Quiculungo'],
                ['nome_municipio' => 'Samba Cajú'],
            ]);

        $cuanzaSul = Provincia::create([
            'abreviacao_provincia' => 'CSU',
            'nome_provincia' => 'Cuanza Sul'
        ]);

        $cuanzaSul->municipios()
            ->createMany([
                ['nome_municipio' => 'Gabela'],
                ['nome_municipio' => 'Cassongue'],
                ['nome_municipio' => 'Cela'],
                ['nome_municipio' => 'Conda'],
                ['nome_municipio' => 'Ebo'],
                ['nome_municipio' => 'Libolo'],
                ['nome_municipio' => 'Mussende'],
                ['nome_municipio' => 'Porto Amboim'],
                ['nome_municipio' => 'Quilenda'],
                ['nome_municipio' => 'Quibala'],
                ['nome_municipio' => 'Seles'],
                ['nome_municipio' => 'Sumbe'],
            ]);

        $cunene = Provincia::create([
            'abreviacao_provincia' => 'CNE',
            'nome_provincia' => 'Cunene'
        ]);

        $cunene->municipios()
            ->createMany([
                ['nome_municipio' => 'Cahama'],
                ['nome_municipio' => 'Cuanhama'],
                ['nome_municipio' => 'Curoca'],
                ['nome_municipio' => 'Cuvelai'],
                ['nome_municipio' => 'Namacunde'],
                ['nome_municipio' => 'Ombadja'],
            ]);

        $huambo = Provincia::create([
            'abreviacao_provincia' => 'HBO',
            'nome_provincia' => 'Huambo'
        ]);

        $huambo->municipios()
            ->createMany([
                ['nome_municipio' => 'Longonjo'],
                ['nome_municipio' => 'Bailundo'],
                ['nome_municipio' => 'Chicala Choloanga'],
                ['nome_municipio' => 'Mungo'],
                ['nome_municipio' => 'Londuimbale'],
                ['nome_municipio' => 'Tchindjendje'],
                ['nome_municipio' => 'Ucuma'],
                ['nome_municipio' => 'Cachiumgo'],
                ['nome_municipio' => 'Caála'],
                ['nome_municipio' => 'Ecunha'],
                ['nome_municipio' => 'Huambo'],
            ]);

        $huila = Provincia::create([
            'abreviacao_provincia' => 'HLA',
            'nome_provincia' => 'Huíla'
        ]);

        $huila->municipios()
            ->createMany([
                ['nome_municipio' => 'Caconda'],
                ['nome_municipio' => 'Cacula'],
                ['nome_municipio' => 'Caluquembe'],
                ['nome_municipio' => 'Gambos'],
                ['nome_municipio' => 'Chibia'],
                ['nome_municipio' => 'Chicomba'],
                ['nome_municipio' => 'Chipindo'],
                ['nome_municipio' => 'Cuvango'],
                ['nome_municipio' => 'Humpata'],
                ['nome_municipio' => 'Jamba'],
                ['nome_municipio' => 'Lubango'],
                ['nome_municipio' => 'Matala'],
                ['nome_municipio' => 'Quilengues'],
                ['nome_municipio' => 'Quipungo'],
            ]);

        $luanda = Provincia::create([
            'abreviacao_provincia' => 'LDA',
            'nome_provincia' => 'Luanda'
        ]);

        $luanda->municipios()
            ->createMany([
                ['nome_municipio' => 'Icolo-e-Bengo'],
                ['nome_municipio' => 'Luanda'],
                ['nome_municipio' => 'Quiçama'],
                ['nome_municipio' => 'Cacuaco'],
                ['nome_municipio' => 'Cazenga'],
                ['nome_municipio' => 'Viana'],
                ['nome_municipio' => 'Belas'],
                ['nome_municipio' => 'Kilamba Kiaxi'],
                ['nome_municipio' => 'Talatona'],
            ]);

        $luandaNorte = Provincia::create([
            'abreviacao_provincia' => 'LNO',
            'nome_provincia' => 'Lunda Norte'
        ]);

        $luandaNorte->municipios()
            ->createMany([
                ['nome_municipio' => 'Cambulo'],
                ['nome_municipio' => 'Capenda Camulemba'],
                ['nome_municipio' => 'Caungula'],
                ['nome_municipio' => 'Chitato'],
                ['nome_municipio' => 'Cuango'],
                ['nome_municipio' => 'Cuílo'],
                ['nome_municipio' => 'Lubalo'],
                ['nome_municipio' => 'Lucapa'],
                ['nome_municipio' => 'Lóvua'],
                ['nome_municipio' => 'Xá-Muteba'],
            ]);

        $lundaSul = Provincia::create([
            'abreviacao_provincia' => 'LSU',
            'nome_provincia' => 'Lunda Sul'
        ]);

        $lundaSul->municipios()
            ->createMany([
                ['nome_municipio' => 'Cacolo'],
                ['nome_municipio' => 'Dala'],
                ['nome_municipio' => 'Muconda'],
                ['nome_municipio' => 'Saurimo'],
            ]);

        $malanje = Provincia::create([
            'abreviacao_provincia' => 'MJE',
            'nome_provincia' => 'Malanje'
        ]);

        $malanje->municipios()
            ->createMany([
                ['nome_municipio' => 'Cacuso'],
                ['nome_municipio' => 'Caombo'],
                ['nome_municipio' => 'Calandula'],
                ['nome_municipio' => 'Cambundi-Catembo'],
                ['nome_municipio' => 'Cangandala'],
                ['nome_municipio' => 'Cauba Nzogo'],
                ['nome_municipio' => 'Cunda-Dia-Baze'],
                ['nome_municipio' => 'Lumquembo'],
                ['nome_municipio' => 'Malanje'],
                ['nome_municipio' => 'Marimba'],
                ['nome_municipio' => 'Massango'],
                ['nome_municipio' => 'Mucari'],
                ['nome_municipio' => 'Quela'],
                ['nome_municipio' => 'Quirima'],
            ]);

        $moxico = Provincia::create([
            'abreviacao_provincia' => 'MCO',
            'nome_provincia' => 'Moxico'
        ]);

        $moxico->municipios()
            ->createMany([
                ['nome_municipio' => 'Alto Zambeze'],
                ['nome_municipio' => 'Bundas'],
                ['nome_municipio' => 'Camanongue'],
                ['nome_municipio' => 'Cameia'],
                ['nome_municipio' => 'Luau'],
                ['nome_municipio' => 'Lucano'],
                ['nome_municipio' => 'Luchazes'],
                ['nome_municipio' => 'Léua'],
                ['nome_municipio' => 'Moxico'],
            ]);

        $namibe = Provincia::create([
            'abreviacao_provincia' => 'NBE',
            'nome_provincia' => 'Namibe'
        ]);

        $namibe->municipios()
            ->createMany([
                ['nome_municipio' => 'Moçâmedes'],
                ['nome_municipio' => 'Camucuio'],
                ['nome_municipio' => 'Bibala'],
                ['nome_municipio' => 'Virei'],
                ['nome_municipio' => 'Tômboa'],
            ]);

        $uige = Provincia::create([
            'abreviacao_provincia' => 'UGE',
            'nome_provincia' => 'Uíge'
        ]);

        $uige->municipios()
            ->createMany([
                ['nome_municipio' => 'Uíge'],
                ['nome_municipio' => 'Alto Cauale'],
                ['nome_municipio' => 'Ambuíla'],
                ['nome_municipio' => 'Bembe'],
                ['nome_municipio' => 'Buengas'],
                ['nome_municipio' => 'Bungo'],
                ['nome_municipio' => 'Milunga'],
                ['nome_municipio' => 'Damba'],
                ['nome_municipio' => 'Maquela do Zombo'],
                ['nome_municipio' => 'Mucaba'],
                ['nome_municipio' => 'Negage'],
                ['nome_municipio' => 'Puri'],
                ['nome_municipio' => 'Quimbele'],
                ['nome_municipio' => 'Quitexe'],
                ['nome_municipio' => 'Sanza Pombo'],
                ['nome_municipio' => 'Songo'],
            ]);

        $zaire = Provincia::create([
            'abreviacao_provincia' => 'ZRE',
            'nome_provincia' => 'Zaire'
        ]);

        $zaire->municipios()
            ->createMany([
                ['nome_municipio' => 'Mbanza Congo'],
                ['nome_municipio' => 'Soyo'],
                ['nome_municipio' => 'Nzeto'],
                ['nome_municipio' => 'Cuimba'],
                ['nome_municipio' => 'Nóqui'],
                ['nome_municipio' => 'Tomboco'],
            ]);
    }
}
