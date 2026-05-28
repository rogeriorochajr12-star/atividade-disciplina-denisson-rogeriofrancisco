titular_nome = input("Digite o nome do titular da conta: ")
titular_cpf = input("Digite o CPF do titular da conta: ")
titular_email = input("Digite o email do titular: ")
conta_numero = input("Digite o número da conta: ")
conta_agencia = "0001"

saldo = float(input("Digite o saldo inicial: "))
limite_saque = 500.00
saques = 0

taxa_deposito = 2.00
taxa_saque = 1.50

historico = []

while True:
    print("\n===== MENU =====")
    print("1 - Depositar")
    print("2 - Sacar")
    print("3 - Dados da conta")
    print("4 - Extrato")
    print("5 - Sair")

    opcao = input("Escolha uma opção: ")

    if opcao == "1":
        valor = float(input("Valor do depósito: "))

        if valor > 0:
            saldo += valor
            saldo -= taxa_deposito

            historico.append(
                f"Depósito: +R$ {valor:.2f} | Taxa: -R$ {taxa_deposito:.2f}"
            )

            print(f"Depósito realizado. Saldo: R$ {saldo:.2f}")
        else:
            print("Valor inválido.")

    elif opcao == "2":
        valor = float(input("Valor do saque: "))

        if saques >= 3:
            print("Limite de saques atingido.")

        elif valor <= 0:
            print("Valor inválido.")

        elif valor > limite_saque:
            print("Limite por saque é R$ 500.")

        elif valor + taxa_saque > saldo:
            print("Saldo insuficiente (com taxa).")

        else:
            saldo -= (valor + taxa_saque)
            saques += 1

            historico.append(
                f"Saque: -R$ {valor:.2f} | Taxa: -R$ {taxa_saque:.2f}"
            )

            print(f"Saque realizado. Saldo: R$ {saldo:.2f}")

            saques_restantes = 3 - saques
            print(f"Saques restantes: {saques_restantes}")

    elif opcao == "3":
        print("\n--- DADOS DA CONTA ---")
        print(f"Titular: {titular_nome}")
        print(f"CPF: {titular_cpf}")
        print(f"Email: {titular_email}")
        print(f"Conta: {conta_numero}")
        print(f"Agência: {conta_agencia}")
        print(f"Saldo: R$ {saldo:.2f}")
        print(f"Saques realizados: {saques}")

    elif opcao == "4":
        print("\n--- EXTRATO ---")

        if not historico:
            print("Nenhuma operação realizada.")
        else:
            for item in historico:
                print(item)

        print(f"Saldo atual: R$ {saldo:.2f}")

    elif opcao == "5":
        print("Encerrando sistema...")
        break

    else:
        print("Opção inválida.")