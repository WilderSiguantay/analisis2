<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oferta".
 *
 * @property int $idferta
 * @property string $titulo
 * @property string $descripcion
 * @property int $puestosVacantes
 * @property string $tiempoContratacion
 * @property string $nivelExperiencia
 * @property int $genero
 * @property string $salarioMInimo
 * @property string $salarioMaximo
 * @property string $escolaridad
 * @property int $empresa_idempresa
 *
 * @property Candidato[] $candidatos
 * @property Users[] $users
 * @property Empresa $empresaIdempresa
 */
class Oferta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'oferta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {


        
            
        return [

            [['descripcion','puestosVacantes','titulo','tiempoContratacion','nivelExperiencia','salarioMInimo',
               'salarioMaximo', 'escolaridad','genero'], 'required','message' => 'Campos requeridos'],
            [['descripcion'], 'string'],
            [['puestosVacantes', 'empresa_idempresa'], 'integer'],
            [['empresa_idempresa'], 'required'],
            [['titulo', 'tiempoContratacion', 'nivelExperiencia', 'salarioMInimo', 'salarioMaximo', 'escolaridad'], 'string', 'max' => 45],
            [['genero'], 'string', 'max' => 1],
            
            [['empresa_idempresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['empresa_idempresa' => 'idempresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idferta' => 'Idferta',
            'titulo' => 'Titulo',
            'descripcion' => 'Descripcion',
            'puestosVacantes' => 'Puestos Vacantes',
            'tiempoContratacion' => 'Tiempo Contratacion',
            'nivelExperiencia' => 'Nivel Experiencia',
            'genero' => 'Genero',
            'salarioMInimo' => 'Salario Minimo',
            'salarioMaximo' => 'Salario Maximo',
            'escolaridad' => 'Escolaridad',
            'empresa_idempresa' => 'Empresa Idempresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidatos()
    {
        return $this->hasMany(Candidato::className(), ['oferta_idferta' => 'idferta', 'oferta_empresa_idempresa' => 'empresa_idempresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['id' => 'Users_id', 'activate' => 'Users_activate'])->viaTable('candidato', ['oferta_idferta' => 'idferta', 'oferta_empresa_idempresa' => 'empresa_idempresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaIdempresa()
    {
        return $this->hasOne(Empresa::className(), ['idempresa' => 'empresa_idempresa']);
    }
}
