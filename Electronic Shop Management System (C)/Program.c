#include<stdio.h>
#include <conio.h>
#include<string.h>
#define TV_PRICE 20000.00
#define OVEN_PRICE 8000.00
#define REFRIGIRATOR_PRICE 25000.00
int main(void)
{
const double WASHINGMACHINE_PRICE = 25000.00;
const double MIXER_PRICE = 10000.00;

int tvQTY;
int OVENQTY;
int REFRIGIRATORQTY;
int WASHINGMACHINEQTY;
int MIXERQTY;
int date;
int date1;
int date2;
int time1;
int time;
float total_tv;
float total_OVEN;
float total_refrigirator;
float total_WASHINGMACHINE;
float total_MIXER;
float subTotal;

float bill_Amount;
char name[250];
char cname[250];

printf("\t\tKUMAR ELECTRONICS SHOP\n\t\t\n");
printf("\n Please Enter the following details. \n\n");
printf("Cashier's Name: \n");
scanf("%s",name);
printf("Customer's Name: \n");
scanf("%s",cname);
printf("\nHow many TVs were sold?\n");
scanf("%d",&tvQTY);
printf("How many OVENS were sold? \n");
scanf("%d", &OVENQTY);
printf("How many REFRIGIRATORS were sold? \n");
scanf("%d", &REFRIGIRATORQTY);
printf("How many WASHING MACHINEs were sold? \n");
scanf("%d", &WASHINGMACHINEQTY);
printf("How many MIXERS were sold? \n");
scanf("%d", &MIXERQTY);
printf("\nenter time\n");
scanf("%d%d",&time,&time1);
printf("enter date\n");
scanf("%d%d%d",&date,&date1,&date2);

total_tv = tvQTY * TV_PRICE;
total_OVEN = OVENQTY * OVEN_PRICE;
total_refrigirator =REFRIGIRATORQTY *REFRIGIRATOR_PRICE;
total_WASHINGMACHINE = WASHINGMACHINEQTY *
WASHINGMACHINE_PRICE;
total_MIXER = MIXERQTY * MIXER_PRICE;
subTotal = total_tv + total_OVEN + total_refrigirator +
total_WASHINGMACHINE + total_MIXER;

bill_Amount = subTotal;

printf("\t\t\t====================================================\n");
printf("\t\t\t\t\tKUMAR ELECTRONICS SHOP\n");
printf("\t\t\tDate-%d-%d-%d",date,date1,date2);
printf("\t\tTime-%d:%d\n", time,time1);
printf("\t\t\t\t\t\tBill\n");
printf("\t\t\t====================================================\n");
printf("\t\t\tQTY \t Description \t Unit Price$\t Total Price$\n");
printf("\t\t\t--- \t ----------- \t ---------- \t -----------\n");
printf("\t\t\t%02d\t TV \t\t %.2f \t%10.2f \n", tvQTY,
TV_PRICE, total_tv);
printf("\t\t\t%02d\t OVEN\t\t %.2f \t%10.2f \n", OVENQTY,
OVEN_PRICE, total_OVEN);
printf("\t\t\t%02d\tREFRIGIRATOR\t %.2f\t %10.2f\n",REFRIGIRATORQTY,REFRIGIRATOR_PRICE, total_refrigirator);
printf("\t\t\t%02d\t WASHING MACHINE %.2f\t %10.2f \n",
WASHINGMACHINEQTY, WASHINGMACHINE_PRICE,
total_WASHINGMACHINE);
printf("\t\t\t%02d\t MIXER\t\t %.2f \t%10.2f \n", MIXERQTY,
MIXER_PRICE, total_MIXER);
printf("\t\t\t_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ \n");
printf("\t\t\t Total$ %10.2f \n", bill_Amount);
printf("\t\t\t Customer Name %s \n", cname);
printf("\t\t\t Cashier Name %s \n", name);
printf("\t\t\t====================================================\n");
printf("\t\t\tEnd of bill.Thanks for Shopping. Visit Again\n");
getch();
return 0;
}

