<?php

namespace App\Filament\Resources\AttentionResource\RelationManagers;

use App\Models\AuxiliaryExam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AuxiliaryExamsRelationManager extends RelationManager
{
    protected static string $relationship = 'auxiliaryExams';
    protected static ?string $modelLabel = 'examen auxiliar';
    protected static ?string $title = 'Examenes auxiliares';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([

                        Forms\Components\Section::make('EXAMENES DE LABORATORIO')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\Checkbox::make('EL_hemograma_completo')
                                    ->label('Hemograma completo'),
                                Forms\Components\Checkbox::make('EL_perfil_coagulacion_completo')
                                    ->label('Perfil de coagulación completo'),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_TC')
                                            ->label('TC'),
                                        Forms\Components\Checkbox::make('EL_TS')
                                            ->label('TS'),
                                    ]),
                                Forms\Components\Checkbox::make('EL_tiempo_protrombina')
                                    ->label('Tiempo de protrombina'),
                                Forms\Components\Checkbox::make('EL_tiempo_tromboplastina_parcial')
                                    ->label('Tiempo de tromboplastina parcial'),
                                Forms\Components\Checkbox::make('EL_plaquetas')
                                    ->label('Plaquetas'),
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_glucosa')
                                            ->label('Glucosa'),
                                        Forms\Components\Checkbox::make('EL_urea')
                                            ->label('Urea'),
                                        Forms\Components\Checkbox::make('EL_creatinina')
                                            ->label('Creatinina'),
                                    ]),
                                Forms\Components\Checkbox::make('EL_perfil_hepetico_completo')
                                    ->label('Perfil hepatico completo'),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_TGO')
                                            ->label('TGO'),
                                        Forms\Components\Checkbox::make('EL_TGP')
                                            ->label('TGP'),
                                    ]),
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_BT')
                                            ->label('BT'),
                                        Forms\Components\Checkbox::make('EL_BD')
                                            ->label('BD'),
                                        Forms\Components\Checkbox::make('EL_BI')
                                            ->label('BI'),
                                    ]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_fosfatasa_alcalina')
                                            ->label('Fosfatasa alcalina'),
                                        Forms\Components\Checkbox::make('EL_GGI')
                                            ->label('GGI'),
                                    ]),
                                Forms\Components\Checkbox::make('EL_perfil_updico_completo')
                                    ->label('Perfil updico completo'),
                                Forms\Components\Checkbox::make('EL_coresterol_total')
                                    ->label('Coresterol total'),
                                Forms\Components\Grid::make(3)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_trigliceridos')
                                            ->label('Trigliceridos'),
                                        Forms\Components\Checkbox::make('EL_HDL')
                                            ->label('HDL'),
                                        Forms\Components\Checkbox::make('EL_LDL')
                                            ->label('LDL'),
                                    ]),
                                Forms\Components\Checkbox::make('EL_perfil_tiroideo_completo')
                                    ->label('Perfil tiroideo completo'),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_TSH')
                                            ->label('TSH'),
                                        Forms\Components\Checkbox::make('EL_T3')
                                            ->label('T3'),
                                    ]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('EL_T3_total')
                                            ->label('T3 Total'),
                                        Forms\Components\Checkbox::make('EL_T3_libre')
                                            ->label('T3 Libre'),
                                    ]),
                                Forms\Components\Checkbox::make('EL_triyodotironina')
                                    ->label('Triyodotironina'),
                                Forms\Components\Checkbox::make('EL_examen_completo_orina')
                                    ->label('Examen completo de orina'),
                            ]),
                        Forms\Components\Section::make('RADIOLOGICOS')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\Checkbox::make('R_radiografia_torax_antero_post_postero_ant')
                                    ->label('Radiografia de torax: Antero-Post Postero-Ant'),
                                Forms\Components\Checkbox::make('R_radiografia_torax_lateral_derecha_izquierda')
                                    ->label('Radiografia de torax lateral: Derecha Izquierda'),
                                Forms\Components\Checkbox::make('R_radiografia_simple_abdomen_pie_decubito')
                                    ->label('Radiografia simple de abdomen de pie Decubito'),
                                Forms\Components\Checkbox::make('R_radiografia_contraste_abdomen')
                                    ->label('Radiografia con contraste de abdomen'),
                                Forms\Components\Checkbox::make('R_radiografia_doble_contraste_abdomen')
                                    ->label('Radiografia doble contraste de abdomen'),
                                Forms\Components\Textarea::make('R_otras')
                                    ->label('Otras')
                                    ->rows(10),

                            ]),
                        Forms\Components\Section::make('RIESGO PRE OPERATORIO')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\Checkbox::make('RPO_hemograma_completo')
                                    ->label('Hemograma completo'),
                                Forms\Components\Checkbox::make('RPO_TC_TS')
                                    ->label('TC, TS'),
                                Forms\Components\Checkbox::make('RPO_glucosa')
                                    ->label('Glucosa'),
                                Forms\Components\Checkbox::make('RPO_urea')
                                    ->label('Urea'),
                                Forms\Components\Checkbox::make('RPO_creatinia')
                                    ->label('Creatinia'),
                                Forms\Components\Checkbox::make('RPO_perfil_hepatico')
                                    ->label('Perfil hepatico'),
                                Forms\Components\Checkbox::make('RPO_HIV')
                                    ->label('HIV'),
                                Forms\Components\Checkbox::make('RPO_VDRL')
                                    ->label('VDRL'),
                                Forms\Components\Checkbox::make('RPO_marcadores_hepatitis')
                                    ->label('Marcadores hepatitis'),

                            ]),
                        Forms\Components\Section::make('ULTRASONIDOS')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\CheckboxList::make('Ecografia de abdomen')
                                    ->options([]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('U_ecografia_abdomen_superior')
                                            ->label('Superior'),
                                        Forms\Components\Checkbox::make('U_ecografia_abdomen_inferior')
                                            ->label('Inferior'),
                                    ]),
                                Forms\Components\CheckboxList::make('Ecografia de partes blandas')
                                    ->options([]),
                                Forms\Components\Checkbox::make('U_ecografia_partes_blandas_pared_abdominal_anterior')
                                    ->label('Pared abdominal anterior'),
                                Forms\Components\Textarea::make('U_ecografia_partes_blandas_especificar')
                                    ->label('Especificar')
                                    ->rows(3),
                                Forms\Components\CheckboxList::make('Region inguinal')
                                    ->options([]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('U_region_inguinal_derecha')
                                            ->label('Derecha'),
                                        Forms\Components\Checkbox::make('U_region_inguinal_izquierda')
                                            ->label('Izquierda'),
                                    ]),
                                Forms\Components\Textarea::make('U_otras')
                                    ->label('Otras')
                                    ->rows(3),
                                Forms\Components\Checkbox::make('U_ecofast')
                                    ->label('Ecofast'),
                            ]),
                        Forms\Components\Section::make('TOMOGRAFIA AXIAL COMPUTARIZADA')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\CheckboxList::make('Tomografia de abdomen superior')
                                    ->options([]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('TAC_abdomen_superior_SC')
                                            ->label('S/C'),
                                        Forms\Components\Checkbox::make('TAC_abdomen_superior_CC')
                                            ->label('C/C'),
                                    ]),
                                Forms\Components\CheckboxList::make('Tomografia toraco-abdominal')
                                    ->options([]),
                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\Checkbox::make('TAC_toraco_abdominal_SC')
                                            ->label('S/C'),
                                        Forms\Components\Checkbox::make('TAC_toraco_abdominal_CC')
                                            ->label('C/C'),
                                    ]),
                                Forms\Components\Textarea::make('TAC_otras')
                                    ->label('Otras')
                                    ->rows(3),
                            ]),
                        Forms\Components\Section::make('RESONANCIAS NUCLEAR MAGNETICA')
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\Checkbox::make('RNM_colangioresonancia')
                                    ->label('Colangioresonancia'),
                                Forms\Components\Textarea::make('RNM_otras')
                                    ->label('Otras')
                                    ->rows(3),
                                Forms\Components\Checkbox::make('RNM_riesgo_cardiologico')
                                    ->label('Riesgo cardiologico'),
                                Forms\Components\Checkbox::make('RNM_riesgo_neumologico')
                                    ->label('Riesgo neumologico'),
                            ]),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ghgh')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('downloadPdf')
                    ->label('Descargar PDF')
                    ->url(fn (AuxiliaryExam $record) => route('auxiliary.exam.pdf', ['id' => $record->id])) // URL para descargar el PDF
                    ->openUrlInNewTab(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
