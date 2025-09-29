#include<iostream.h>
#include<conio.h>
#include<fstream.h>
#include<iomanip.h>
#include<string.h>
class Library
{
int BookId;
 char Title[20];
 char Author[20];
 char Category[20];
 int Pages;
 float Price;
public:
int getID(){return BookId;}
 char* getTitle(){return Title;}
 char* getAuthor(){return Author;}
 char* getCategory(){return Category;}
 float getPrice(){return Price;}
Library()
 {
 BookId=0;
 strcpy(Title,"");
 strcpy(Author,"");
 strcpy(Category,"");
 Pages=0;
 Price=0;
}
void getBook();
void listView();
void showBook();
void header();
}l;
void Library::getBook()
{
clrscr();
cout<<"\tEnter Book Id : ";
cin>>BookId;
cout<<"\tEnter Book Title : ";
cin.get();
cin.getline(Title,20);
cout<<"\tEnter Book Author: ";
cin.getline(Author,20);
cout<<"\tEnter Book Category: ";
cin.getline(Category,20);
cout<<"\tEnter No. of Pages : ";
cin>>Pages;
cout<<"\tEnter Price of Book: ";
cin>>Price;
cout<<endl;
}
void Library::showBook()
{
cout<<endl;
cout<<"Book ID : "<<BookId<<endl;
cout<<"Book Title : "<<Title<<endl;
cout<<"Author Name : "<<Author<<endl;
cout<<"Category : "<<Category<<endl;
cout<<"No. of Pages : "<<Pages<<endl;
cout<<"Price of Book: "<<Price<<endl;
}
void Library::header()
{
cout.setf(ios::left);
cout<<setw(5)<<"I.D."
 <<setw(20)<<"Book Title"
 <<setw(20)<<"Book Author"
 <<setw(15)<<"Category"
 <<setw(6)<<"Pages"
 <<setw(6)<<"Price"<<endl;
for(int i=1;i<=72;i++)
 cout<<"=";
cout<<endl;
}
void Library::listView()
{
cout.setf(ios::left);
cout<<setw(5)<<BookId
 <<setw(20)<<Title
 <<setw(20)<<Author
 <<setw(15)<<Category
 <<setw(6)<<Pages
 <<setw(6)<<Price<<endl;
}
void drawLine(char);
void heading();
void menu();
void searchMenu();
void addBook();
void displayBooks();
void searchByID();
void searchByTitle();
void searchByCategory();
void searchByPrice();
void searchByAuthor();
void dispose();
void modify();
void displayDisposed();
void drawLine(char ch)
{
for(int i=1;i<80;i++)
 cout<<ch;
cout<<endl;
}
void heading()
{
drawLine('.');
cout<<"\t\t\tWELCOME TO LIBRARAY MANAGEMENT SYSTEM\n";
drawLine('.');
}
void addBook()
{
ofstream fout;
fout.open("books.dat",ios::app);
l.getBook();
fout.write((char*)&l,sizeof(l));
cout<<"Book data saved in file...\n";
fout.close();
}
void displayBooks()
{
ifstream fin("books.dat");
int rec=0;
while(fin.read((char*)&l,sizeof(l)))
{
 if(rec<1)
 l.header();
 l.listView();
 rec++;
}
fin.close();
cout<<"\nTotal "<<rec<<" Records in file...\n";
}
void searchByID()
{
int n,flag=0;
ifstream fin("books.dat");
cout<<"Enter Book ID : ";
cin>>n;
while(fin.read((char*)&l,sizeof(l)))
{
 if(n==l.getID())
 {
 l.showBook();
 flag++;
 }
}
fin.close();
if(flag==0)
 cout<<"Book Number with ID:"<<n<<" not available...\n";
}
void searchByTitle()
{
int flag=0;
char title[20];
ifstream fin("books.dat");
cout<<"Enter Book Title : ";
cin.ignore();
cin.getline(title,20);
while(fin.read((char*)&l,sizeof(l)))
{
 if(strcmpi(title,l.getTitle())==0)
 {
 l.showBook();
 flag++;
 }
}
fin.close();
if(flag==0)
 cout<<"Book with Title: "<<title<<" not available...\n";
}
void searchByCategory()
{
int flag=0,rec=0;
char cat[20];
ifstream fin("books.dat");
cout<<"Enter Book Category : ";
cin.ignore();
cin.getline(cat,20);
while(fin.read((char*)&l,sizeof(l)))
{
 if(strcmpi(cat,l.getCategory())==0)
 {
 if(rec<1)
 l.header();
 l.listView();
 flag++;
 rec++;
 }
}
fin.close();
if(flag==0)
 cout<<"Book with Category: "<<cat<<" not available...\n";
}
void searchByAuthor()
{
int flag=0,rec=0;
char aut[20];
ifstream fin("books.dat");
cout<<"Enter Book Author : ";
cin.ignore();
cin.getline(aut,20);
while(fin.read((char*)&l,sizeof(l)))
{
 if(strcmpi(aut,l.getAuthor())==0)
 {
 if(rec<1)
 l.header();
 l.listView();
 flag++;
 rec++;
 }
}
fin.close();
if(flag==0)
 cout<<"Book with Author name: "<<aut<<" not available...\n";
}
void searchByPrice()
{
int flag=0,rec=0;
float minrate, maxrate;
ifstream fin("books.dat");
cout<<"Enter Minimum Price of Book : ";
cin>>minrate;
cout<<"Enter Maximum Price of Book : ";
cin>>maxrate;
while(fin.read((char*)&l,sizeof(l)))
{
 if(l.getPrice()>=minrate && l.getPrice()<=maxrate)
 {
 if(rec<1)
 l.header();
 l.listView();
 flag++;
 rec++;
 }
}
fin.close();
if(flag==0)
 cout<<"Books between Price Range: "<<minrate
 <<" and "<<maxrate<<" not available...\n";
}
void dispose()
{
int n,flag=0;
ifstream fin("books.dat");
ofstream fout("dispose.dat",ios::out);
cout<<"Enter Book ID : ";
cin>>n;
while(fin.read((char*)&l,sizeof(l)))
{
 if(n==l.getID())
 {
 l.showBook();
 flag++;
 }
 else
 {
 fout.write((char*)&l,sizeof(l));
 }
}
fin.close();
fout.close();
if(flag==0)
 cout<<"Book Number with ID:"<<n<<" not available...\n";
}
void modify()
{
int n,flag=0,pos;
fstream fin("books.dat",ios::in|ios::out);
cout<<"Enter Book ID : ";
cin>>n;
while(fin.read((char*)&l,sizeof(l)))
{
 if(n==l.getID())
 {
 pos=fin.tellg();
 cout<<"Following data will be edited...\n";
 l.showBook();
 flag++;
 fin.seekg(pos-sizeof(l));
 l.getBook();
 fin.write((char*)&l,sizeof(l));
 cout<<"\nData Modified successfully...\n";
 }
}
fin.close();
if(flag==0)
 cout<<"Book Number with ID:"<<n<<" not available...\n";
}
void displayDisposed()
{
ifstream fin("dispose.dat");
int rec=0;
while(fin.read((char*)&l,sizeof(l)))
{
 if(rec<1)
 l.header();
 l.listView();
 rec++;
}
fin.close();
cout<<"\nTotal "<<rec<<" Records in disposed off file...\n";
}
void menu()
{
clrscr();
int ch;
do
{
 heading();
 cout<<"\n\t\t\t\t\tMENU";
 cout<<"\n\t1. Add New Book\n";
 cout<<"\n\t2. Display All Books\n";
 cout<<"\n\t3. Search Books\n";
 cout<<"\n\t4. Disposed Off Books\n";
 cout<<"\n\t5. Modify Details\n";
 cout<<"\n\t6. List Of Disposed Books\n";
 cout<<"\n\tEnter Your Choice : ";
 cin>>ch;
 heading();
 switch(ch)
 {
 case 1: addBook(); break;
 case 2: displayBooks(); break;
 case 3: searchMenu(); break;
 case 4: dispose(); break;
 case 5: modify(); break;
 case 6: displayDisposed(); break;
 }
}while(ch!=0);
}
void searchMenu()
{
int ch;
do
{
 heading();
 cout<<"BOOK SEARCH OPTIONS\n";
 cout<<"0. Back\n";
 cout<<"1. By ID\n";
 cout<<"2. By Title\n";
 cout<<"3. By Category\n";
 cout<<"4. By Author\n";
 cout<<"5. By Price Range\n";
 cout<<"Enter Your Choice : ";
 cin>>ch;
 heading();
 switch(ch)
 {
 case 1: searchByID(); break;
 case 2: searchByTitle(); break;
 case 3: searchByCategory(); break;
 case 4: searchByAuthor(); break;
 case 5: searchByPrice();break;
 default: cout<<"\a";
 }
}while(ch!=0);
}
int main()
{
menu();
return 0;
}
