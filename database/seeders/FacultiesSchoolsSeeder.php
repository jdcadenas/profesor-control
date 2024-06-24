<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultiesSchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facultyAgronomia = Faculty::create([
            'name' => 'Facultad de Agronomía',
            'description' => 'Imparte carreras relacionadas con la Agronomía.',
        ]);
        $facultyArquitectura = Faculty::create([
            'name' => 'Facultad de Arquitectura y Urbanismo',
            'description' => 'Imparte carreras relacionadas con la Arquitectura y Urbanismo.',
        ]);
        $facultyCiencias = Faculty::create([
            'name' => 'Facultad de Ciencias',
            'description' => 'Imparte carreras relacionadas con Ciencias.',
        ]);
        $facultyEconomicas = Faculty::create([
            'name' => 'Facultad de Ciencias Económicas y Sociales',
            'description' => 'Imparte carreras relacionadas con las Ciencias Económicas y Sociales.',
        ]);
        $facultyFarmacia = Faculty::create([
            'name' => 'Facultad de Farmacia',
            'description' => 'Imparte carreras relacionadas con la Farmacia.',
        ]);
        $facultyHumanidades = Faculty::create([
            'name' => 'Facultad de Humanidades y Educación',
            'description' => 'Imparte carreras relacionadas con la ingeniería.',
        ]);
        $facultyIngenieria = Faculty::create([
            'name' => 'Facultad de Ingeniería',
            'description' => 'Imparte carreras relacionadas con la ingeniería.',
        ]);
        $facultyJuridicas = Faculty::create([
            'name' => 'Facultad de Ciencias Jurídicas y Políticas',
            'description' => 'Imparte carreras relacionadas con las Ciencias Jurídicas y Políticas.',
        ]);
        $facultyMedicina = Faculty::create([
            'name' => 'Facultad de Medicina',
            'description' => 'Imparte carreras relacionadas con la ingeniería.',
        ]);

        $facultyOdontologia = Faculty::create([
            'name' => 'Facultad de Odontología',
            'description' => 'Imparte carreras relacionadas con la Odontología.',
        ]);

        $facultyVeterinaria = Faculty::create([
            'name' => 'Facultad de Veterinaria',
            'description' => 'Imparte carreras relacionadas con la Veterinaria.',
        ]);

        /** escuelas de Agronomía */
        School::create([
            'name' => 'Escuela de Agronomía',
            'description' => 'Forma profesionales en el área de Agronomía.',
            'faculty_id' => $facultyAgronomia->id,
        ]);
        /** escuelas de Arquitectura */
        School::create([
            'name' => 'Escuela de Arquitectura «Carlos Raúl Villanueva»',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyArquitectura->id,
        ]);
        /** escuelas de Ciencias */
        School::create([
            'name' => 'Escuela de Biología',
            'description' => 'Forma profesionales en el área de Biología.',
            'faculty_id' => $facultyCiencias->id,
        ]);

        School::create([
            'name' => 'Escuela de Computación',
            'description' => 'Forma profesionales en el área de Computación.',
            'faculty_id' => $facultyCiencias->id,
        ]);
        School::create([
            'name' => 'Escuela de Física',
            'description' => 'Forma profesionales en el área de Física.',
            'faculty_id' => $facultyCiencias->id,
        ]);
        School::create([
            'name' => 'Escuela de Geoquímica',
            'description' => 'Forma profesionales en el área de Geoquímica.',
            'faculty_id' => $facultyCiencias->id,
        ]);
        School::create([
            'name' => 'Escuela de Matemática',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyCiencias->id,
        ]);
        School::create([
            'name' => 'scuela de Química',
            'description' => 'Forma profesionales en el área de Química.',
            'faculty_id' => $facultyCiencias->id,
        ]);

        /**  Escuelas de Ciencias Económicas y Sociales*/
        School::create([
            'name' => 'Escuela de Administración y Contaduría',
            'description' => 'Forma profesionales en el área de Administración y Contaduría.',
            'faculty_id' => $facultyEconomicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Antropología',
            'description' => 'Forma profesionales en el área de Antropología.',
            'faculty_id' => $facultyEconomicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Estadística y Ciencias Actuariales',
            'description' => 'Forma profesionales en el área de Estadística y Ciencias Actuariales.',
            'faculty_id' => $facultyEconomicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Economía',
            'description' => 'Forma profesionales en el área de Economía.',
            'faculty_id' => $facultyEconomicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Estudios Internacionales',
            'description' => 'Forma profesionales en el área de Estudios Internacionales.',
            'faculty_id' => $facultyEconomicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Sociología',
            'description' => 'Forma profesionales en el área de Sociología.',
            'faculty_id' => $facultyEconomicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Trabajo Social',
            'description' => 'Forma profesionales en el área de Trabajo Social.',
            'faculty_id' => $facultyEconomicas->id,
        ]);

        /** Escuelas de Facultad de Ciencias Jurídicas y Políticas */

        School::create([
            'name' => 'Escuela de Derecho',
            'description' => 'Forma profesionales en el área de Derecho.',
            'faculty_id' => $facultyJuridicas->id,
        ]);
        School::create([
            'name' => 'Escuela de Estudios Políticos y Administrativos',
            'description' => 'Forma profesionales en el área de Estudios Políticos y Administrativos.',
            'faculty_id' => $facultyJuridicas->id,
        ]);

        /** Escuelas de la facultad de Medicina Veterinaria */
        School::create([
            'name' => 'Escuela de Medicina Veterinaria',
            'description' => 'Forma profesionales en el área de Medicina Veterinaria.',
            'faculty_id' => $facultyVeterinaria->id,
        ]);

        /** Escuelas de la Facultad de Farmacia */
        School::create([
            'name' => 'Escuela de Farmacia «Dr. Jesús María Bianco»',
            'description' => 'Forma profesionales en el área de Farmacia.',
            'faculty_id' => $facultyFarmacia->id,
        ]);

        /** Escuelas de la Facultad de Humanidades y Educación */
        School::create([
            'name' => 'Escuela de Artes',
            'description' => 'Forma profesionales en el área de Artes.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Bibliotecología y Archivología',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Comunicación Social',
            'description' => 'Forma profesionales en el área de Comunicación.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Educación',
            'description' => 'Forma profesionales en el área de Educación.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Filosofía',
            'description' => 'Forma profesionales en el área de Filosofía.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Geografía',
            'description' => 'Forma profesionales en el área de Geografía.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Historia',
            'description' => 'Forma profesionales en el área de Historia.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Idiomas Modernos',
            'description' => 'Forma profesionales en el área de Idiomas.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Letras',
            'description' => 'Forma profesionales en el área de Letras.',
            'faculty_id' => $facultyHumanidades->id,
        ]);
        School::create([
            'name' => 'Escuela de Psicología',
            'description' => 'Forma profesionales en el área de Psicología.',
            'faculty_id' => $facultyHumanidades->id,
        ]);

        /** Escuelas de  la Facultad de Ingeniería */

        School::create([
            'name' => 'Escuela de Ciclo Básico de Ingeniería',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería Civil',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería Eléctrica',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería Mecánica',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería Metalúrgica y Ciencias de los Materiales',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería Química',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería de Petróleo',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);
        School::create([
            'name' => 'Escuela de Ingeniería de Procesos Industriales (Núcleo de Ingeniería Cagua)',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyIngenieria->id,
        ]);


        /** Escuelas de la Facultad de Medicina */

        School::create([
            'name' => 'Escuela de Bioanálisis',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyMedicina->id,
        ]);
        School::create([
            'name' => 'Escuela de Enfermería',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyMedicina->id,
        ]);
        School::create([
            'name' => 'Escuela de Medicina Dr. Luis Razetti',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyMedicina->id,
        ]);
        School::create([
            'name' => 'Escuela de Medicina Dr. José María Vargas',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyMedicina->id,
        ]);
        School::create([
            'name' => 'Escuela de Nutrición y Dietética',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyMedicina->id,
        ]);
        School::create([
            'name' => 'Escuela de Salud Pública',
            'description' => 'Forma profesionales en el área de Arquitectura.',
            'faculty_id' => $facultyMedicina->id,
        ]);

/** Escuela Facultad de Odontología */

        School::create([
            'name' => 'Escuela de Odontología',
            'description' => 'Forma profesionales en el área de Odontología.',
            'faculty_id' => $facultyOdontologia->id,
        ]);
       
    }
}
