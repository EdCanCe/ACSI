#include <bits/stdc++.h>
#define fore(i, l, r) for (long long i = (l); i < (r); i++)
#define forex(i, l, r) for (long long i = (l); i >= (r); i--)
#define ll long long
#define ull unsigned long long
#define nl cout<<"\n"
#define cnl "\n"
#define rfc "\033[31;1m"
#define gfc "\033[32;1m"
#define yfc "\033[33;1m"
#define bfc "\033[34;1m"
#define pfc "\033[35;1m"
#define cfc "\033[36;1m"
#define nfc "\033[0m"
#define pb push_back
using namespace std;

int iteraciones=50;

int contadorReceta=0, medicinas=0;

vector<string> nombres, apellidos, terminaciones, inicios, medios, alergias, escuelas, especialidades, componentes, padecimientos, diagnosticos, dosis, tipossangre;
map<string, bool> nombresmed, nocontrol, cedprof, usuario;
vector<string> numeroscontrol, cedulasprofesionales;

struct Alumno{
	string NombreAl, ApPaternoAl, ApMaternoAl, TipoSangre, Alergias, NombreTut, ApPaternoTut, ApMaternoTut;
	string NoControl, CURPAl, NoTelefonoTut, FechaNacAl;
};

struct Doctor{
	string NombreDoc, ApPaternoDoc, ApMaternoDoc, InstitutoEgreso, Especialidad;
	string CedulaProf, HoraEntrada, HoraSalida;
};

struct Cuenta{
	string Usuario, Pass="hola123", TipoCuenta="1", CedulaDocFK; 
};

struct Medicina{
	string NombreMed, ComponenteAct;
	string GramajeMed, CantidadMedicina="0";
};

struct Receta{
	string NoControlFK, CedulaProfFK, Padecimientos, TempPaciente, Dosis, Diagnostico, Fecha, PesoPaciente, Altura;
};

struct CantidadesMed{
	string Cantidad, MedicinaIDFK, NoConsultaFK;
};

void meterNombres(string s){
	string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			nombres.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	nombres.push_back(aux);
}

void meterApellidos(string s){
	string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			apellidos.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	apellidos.push_back(aux);
}

void meterTerminaciones(string s){
    string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			terminaciones.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	terminaciones.push_back(aux);
}

void meterInicios(string s){
    string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			inicios.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	inicios.push_back(aux);
}

void meterMedios(string s){
    string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			medios.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	medios.push_back(aux);
}

void meterAlergias(string s){
    string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			alergias.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	alergias.push_back(aux);
}

void meterEscuelas(string s){
	string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			escuelas.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	escuelas.push_back(aux);
}

void meterEspecialidades(string s){
	string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			especialidades.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	especialidades.push_back(aux);
}

void meterComponentes(string s){
	string aux="";
	fore(i,0,s.size()){
		if(s[i]==' '){
			componentes.push_back(aux);
			aux="";
		}else{
			aux+=s[i];
		}
	}
	componentes.push_back(aux);
}

char generarNumero(int n){
	int x=rand() % n + '0';
	return x;
}

string generarNombre(){
	int x=rand() % nombres.size();
	return nombres[x];
}

string generarApellido(){
	int x=rand() % apellidos.size();
	return apellidos[x];
}

void generarAlumno(){
	Alumno gaux;
	gaux.NombreAl = generarNombre();
	gaux.ApPaternoAl = generarApellido();
	gaux.ApMaternoAl = generarApellido();
	gaux.NombreTut = generarNombre();
	gaux.ApPaternoTut = generarApellido();
	gaux.ApMaternoTut = generarApellido();
	gaux.Alergias = alergias[rand() % alergias.size()];
	gaux.TipoSangre = tipossangre[rand() % tipossangre.size()];

	string saux="";
	fore(i,0,14){
		saux += generarNumero(10);
	}
	gaux.NoControl = saux;
	saux="";

	saux="443";
	fore(i,0,7){
		saux += generarNumero(10);
	}
	gaux.NoTelefonoTut = saux;
	saux="";

	string dia="", anio="", mes="";
	saux="200";
	saux+= generarNumero(6);
	anio+=saux[2];
	anio+=saux[3];
	saux+="-";
	int naux=generarNumero(12)+1-'0';
	if(naux<10) {
		saux+="0";
		mes+="0";
	}
	saux+=to_string(naux);
	mes+=to_string(naux);
	saux+="-";
	naux=generarNumero(28)+1-'0';
	if(naux<10) {
		saux+="0";
		dia+="0";
	}
	saux+=to_string(naux);
	dia+=to_string(naux);
	gaux.FechaNacAl=saux;

	saux="";
	saux=gaux.ApPaternoAl[0];
	saux+=gaux.ApPaternoAl[1];
	saux+=gaux.ApMaternoAl[0];
	saux+=gaux.NombreAl[0];
	fore(i,0,saux.size()){

		if(saux[i]=='Á'||saux[i]=='á') saux[i]='A';
		if(saux[i]=='É'||saux[i]=='é') saux[i]='A';
		if(saux[i]=='Í'||saux[i]=='í') saux[i]='A';
		if(saux[i]=='Ó'||saux[i]=='ó') saux[i]='A';
		if(saux[i]=='Ú'||saux[i]=='ú') saux[i]='A';

		if(saux[i]>'Z'){
			saux[i]-=('a'-'A');
		}
	}
	saux+=(anio+mes+dia); //050414
	saux+="HMNNRDA";
	saux+=generarNumero(10);
	gaux.CURPAl=saux;

    while(nocontrol[gaux.NoControl]==1){
        saux="";
        fore(i,0,14){
            saux += generarNumero(10);
        }
        gaux.NoControl = saux;
        saux="";
    }
	numeroscontrol.push_back(gaux.NoControl);
    nocontrol[gaux.NoControl]=1;

	//AQUÍ ES LA INSERCIÓN CAMBIAR!!!!!
	cout<<"insert into Alumnos(NombreAl, ApPaternoAl, ApMaternoAl, FechaNacAl, CURPAl, NombreTut, ApPaternoTut, ApMaternoTut, NoTelefonoTut, Alergias, TipoSangre, NoControl) values(\""<<gaux.NombreAl<<"\", \""<<gaux.ApPaternoAl<<"\", \""<<gaux.ApMaternoAl<<"\", \""<<gaux.FechaNacAl<<"\", \""<<gaux.CURPAl<<"\", \""<<gaux.NombreTut<<"\", \""<<gaux.ApPaternoTut<<"\", \""<<gaux.ApMaternoTut<<"\", \""<<gaux.NoTelefonoTut<<"\", \""<<gaux.Alergias<<"\", \""<<gaux.TipoSangre<<"\", "<<gaux.NoControl<<");\n\n";
}

void generarDoctor(){
	Doctor gaux;
	gaux.NombreDoc = generarNombre();
	gaux.ApMaternoDoc = generarApellido();
	gaux.ApPaternoDoc = generarApellido();
	gaux.Especialidad = especialidades[rand() % especialidades.size()];
	gaux.InstitutoEgreso = escuelas[rand() % escuelas.size()];

	string saux;
	fore(i,0,8){
		saux+=generarNumero(10);
	}
	gaux.CedulaProf=saux;
	saux="";

	saux+= (generarNumero(2));
	saux+=(generarNumero(10));
	saux+= ":";
	saux+=(generarNumero(6));
	saux+="0:00";
	gaux.HoraEntrada=saux;
	saux="";

	saux+= (generarNumero(2));
	saux+=(generarNumero(10));
	saux+= ":";
	saux+=(generarNumero(6));
	saux+="0:00";
	gaux.HoraSalida=saux;
	saux="";


    while(cedprof[gaux.CedulaProf]==1){
        saux="";
        fore(i,0,8){
		saux+=generarNumero(10);
        }
        gaux.CedulaProf=saux;
        saux="";
    }
    cedulasprofesionales.push_back(gaux.CedulaProf);
    cedprof[gaux.CedulaProf]=1;

	cout<<"insert into Doctor(CedulaProf, HoraEntrada, HoraSalida, InstitutoEgreso, Especialidad, NombreDoc, ApPaternoDoc, ApMaternoDoc) values"<<"(\""<<gaux.CedulaProf<<"\", \""<<gaux.HoraEntrada<<"\", \""<<gaux.HoraSalida<<"\", \""<<gaux.InstitutoEgreso<<"\", \""<<gaux.Especialidad<<"\", \""<<gaux.NombreDoc<<"\", \""<<gaux.ApPaternoDoc<<"\", \""<<gaux.ApMaternoDoc<<"\");\n\n";

    cout<<"insert into Cuenta(Usuario, Pass, TipoCuenta, CedulaDocFK) values(\""<<gaux.NombreDoc[0]<<gaux.NombreDoc[1]<<gaux.NombreDoc[2]<<gaux.CedulaProf<<"\", \"hola123\", 1, \""<<gaux.CedulaProf<<"\");\n\n";

}

void generarMedicina(){
    Medicina gaux;
    string saux="";

    saux+=inicios[rand() % inicios.size()];
    saux+=medios[rand() % medios.size()];
    saux+=terminaciones[rand() % terminaciones.size()];

    while(nombresmed[saux]==1){
        saux=inicios[rand() % inicios.size()];
        saux+=medios[rand() % medios.size()];
        saux+=terminaciones[rand() % terminaciones.size()];
    }
    nombresmed[saux]=1;
    gaux.NombreMed=saux;
    medicinas++;

    saux="";
    gaux.ComponenteAct = componentes[rand() % componentes.size()];

    gaux.CantidadMedicina = to_string(rand() % 100);

    cout<<"insert into Medicina(NombreMed, ComponenteAct, GramajeMed) values(\""<<gaux.NombreMed<<"\", \""<<gaux.ComponenteAct<<"\", \""<<gaux.CantidadMedicina<<"\");\n\n";
}

void generarCantidadMed(){
	CantidadesMed gaux;
    string saux="";
	gaux.NoConsultaFK = to_string(contadorReceta);
	gaux.MedicinaIDFK = to_string(rand() % medicinas + 1);
	gaux.Cantidad = to_string(rand() % 10 + 1);

	cout<<"insert into CantidadesMed(Cantidad, MedicinaIDFK, NoConsultaFK) values ("<<gaux.Cantidad<<", "<<gaux.MedicinaIDFK<<", "<<gaux.NoConsultaFK<<");\n\n";
}

void generarReceta(){
	Receta gaux;
	contadorReceta++;
	gaux.NoControlFK = numeroscontrol[rand() % numeroscontrol.size()];
	gaux.CedulaProfFK = cedulasprofesionales[rand() % cedulasprofesionales.size()];
	gaux.Padecimientos = padecimientos[rand() % padecimientos.size()];
	gaux.Diagnostico = diagnosticos[rand() % diagnosticos.size()];
	gaux.Dosis = dosis[rand() % dosis.size()];
	gaux.TempPaciente = to_string((rand() % 3)+36);
	gaux.PesoPaciente = to_string((rand() % 60)+30);
	gaux.Altura = to_string((rand() % 100)/100 + 1);

	cout<<"insert into Receta(NoControlFK, CedulaProfFK, Padecimientos, Diagnostico, Dosis, TempPaciente, PesoPaciente, Altura) values("<<gaux.NoControlFK<<", \""<<gaux.CedulaProfFK<<"\", \""<<gaux.Padecimientos<<"\", \""<<gaux.Diagnostico<<"\", \""<<gaux.Dosis<<"\", "<<gaux.TempPaciente<<", "<<gaux.PesoPaciente<<", "<<gaux.Altura<<");\n\n";

	int naux = rand() % 3;
	fore(i,0,naux){
		generarCantidadMed();
	}
}

int main(){
	srand (time(NULL));
	ios_base::sync_with_stdio(0);
	cin.tie(0);
	freopen("input.txt", "r", stdin);  //Elimina esta linea
	freopen("output.txt","w", stdout);

	string aux;

	getline(cin,aux);
	meterNombres(aux);

	getline(cin,aux);
	meterApellidos(aux);

	getline(cin,aux);
	meterTerminaciones(aux);

	getline(cin,aux);
	meterInicios(aux);

	getline(cin,aux);
	meterMedios(aux);

	getline(cin,aux);
	meterAlergias(aux);

	getline(cin,aux);
	meterEspecialidades(aux);
	
	getline(cin,aux);
	meterComponentes(aux);

	escuelas.push_back("Tecnológico de Monterrey campus GDL");
	escuelas.push_back("Tecnológico de Monterrey campus MTY");
	escuelas.push_back("Tecnológico de Monterrey campus CDMX");
	escuelas.push_back("UMSNH");
	escuelas.push_back("UNIMO");
	escuelas.push_back("UVAQ");

	padecimientos.push_back("Dolor de barriga");
	padecimientos.push_back("Dolor de cabeza");
	padecimientos.push_back("Dolor de muelas");
	padecimientos.push_back("Dolor de brazo");
	padecimientos.push_back("Sangrado en la nariz");
	padecimientos.push_back("Desmayo");

	diagnosticos.push_back("Diarrea");
	diagnosticos.push_back("Migraña");
	diagnosticos.push_back("Caries");
	diagnosticos.push_back("Sobreextensión muscilar");
	diagnosticos.push_back("Golpe en la cabeza que provocó contusión");
	diagnosticos.push_back("Desnutrición");

	dosis.push_back("Resposo en cama por 2 días, tomar dialgin cada 4 horas por 2 días, luego cada 12 por 3 días");
	dosis.push_back("Dormir en casa");
	dosis.push_back("Comer más");
	dosis.push_back("Tener cabeza normal y apretar nariz por 1 minuto");
	dosis.push_back("Compresas con hielpo x2 horas");

	tipossangre.push_back("O-");
	tipossangre.push_back("O+");
	tipossangre.push_back("A-");
	tipossangre.push_back("A+");
	tipossangre.push_back("B-");
	tipossangre.push_back("B+");
	tipossangre.push_back("AB-");
	tipossangre.push_back("AB+");

	fore(i,0,iteraciones){
		//cout<<rfc;
		generarAlumno();
		//cout<<bfc;
		generarDoctor();
		//cout<<pfc;
		generarMedicina();
	}

	fore(i,0,((iteraciones*5))){
		//cout<<yfc;
		generarReceta();
	}

	/*debug(nombres);
	debug(apellidos)
	debug(terminaciones);
	debug(inicios);
	debug(medios);
	debug(alergias);
	debug(escuelas);
	debug(especialidades);
	debug(componentes);
	debug(padecimientos);
	debug(diagnosticos);
	debug(dosis);*/

	//cout<<nfc<<"\n"; //Eliminar esta linea
}