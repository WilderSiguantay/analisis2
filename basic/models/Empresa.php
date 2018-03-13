<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $idempresa
 * @property string $areaEmpresarial
 * @property string $nombre
 * @property string $direccion
 *
 * @property DetalleOferta[] $detalleOfertas
 * @property Usuario[] $usuarios
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['areaEmpresarial', 'nombre'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idempresa' => 'Idempresa',
            'areaEmpresarial' => 'Area Empresarial',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleOfertas()
    {
        return $this->hasMany(DetalleOferta::className(), ['empresa_idempresa' => 'idempresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['empresa_idempresa' => 'idempresa']);
    }
}
